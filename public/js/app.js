// data
const products = [
    { id: 1, description: "Rebloch lardon", price: 14, img: 'img/1reblochon.png'},
    { id: 2, description: 'Poulet tomate', price: 13, img: 'img/2poulet.png'},
    { id: 3, description: 'Tomate fromage', price: 7, img: 'img/3tomate.png'},
    { id: 4, description: 'Comté mozza', price: 10, img: 'img/4comte.png'},
    { id: 5, description: 'Piment olive', price: 11, img: 'img/5piment.png'},
    { id: 6, description: 'Pepper fromage', price: 12, img: 'img/6pepperoni.png'},
    { id: 7, description: 'Brocoli tomate', price: 9, img: 'img/7brocoli.png'},
    { id: 8, description: 'Tomate cerise', price: 8, img: 'img/8cerisetomate.png'},
    { id: 9, description: 'Chorizo fromage', price: 12, img: 'img/9chorizo.png'},
    { id: 10, description: 'Champi tomate', price: 8, img: 'img/10champignon.png'},
    { id: 11, description: 'Calzone nutella', price: 7, img: 'img/11calzonutella.png'},
    { id: 12, description: 'Smarties banane', price: 10, img: 'img/12smarties.png'},
];

    const Home = {
        template: '#home',
        name: 'Home',
        data: () =>{
            return {
                products,
                searchKey: '',
                liked: [],
                cart: []
            }
        },
        computed: {
            filteredList(){
                return this.products.filter((product) => {
                    return product.description.toLowerCase().includes(this.searchKey.toLowerCase());
                })
            },
            getLikeCookie(){
                let cookieValue = JSON.parse($cookies.get('like'));
                cookieValue == null ? this.liked = [] : this.liked = cookieValue
            },
            cartTotalAmount(){
                let total = 0;
                for (let item in this.cart){
                    total = total + (this.cart[item].quantity * this.cart[item].price);
                }
                return total;
            },
            itemTotalAmount(){
                let itemTotal = 0;
                for (let item in this.cart){
                    itemTotal = itemTotal + (this.cart[item].quantity);
                }
                return itemTotal;
            }
        },
        methods: {
            setLikeCookie(){
                document.addEventListener('input', () => {
                    setTimeout(() => {
                        $cookies.set('like', JSON.stringify(this.liked));
                    }, 300);
                })
            },
            addToCart(product){
                //Check if already in array
                for (let i=0; i< this.cart.length; i++){
                    if (this.cart[i].id === product.id) {
                        return this.cart[i].quantity++
                    }
                }
                this.cart.push({
                    id: product.id,
                    img: product.img,
                    description: product.description,
                    price: product.price,
                    quantity: 1
                })
            },
            cartPlusOne(product){
                product.quantity = product.quantity +1;
            },
            cartMinusOne(product, id){
                if (product.quantity == 1){
                    this.cartRemoveItem(id)
                } else {
                    product.quantity = product.quantity - 1;
                }
            },
            cartRemoveItem(id){
                this.$delete(this.cart, id)
            }

        },
        mounted: () => {
           this.getLikeCookie;
        }
    }

    const UserSettings = {
        template: '<h1>UserSettings</h1>',
        name: 'UserSettings'
    }
    const WishList = {
        template: '<h1>WishList</h1>',
        name: 'WishList'
    }
    const ShoppingCart = {
        template: '<h1>ShoppingCart</h1>',
        name: 'ShoppingCart'
    }


    //router
    const router = new VueRouter({
        routes: [
            { path: '/', component: Home, name:'Home'},
            { path: '/user-settings', component: UserSettings, name: 'UserSettings'},
            { path: '/wish-list', component: WishList, name: 'WishList'},
            { path: '/shopping-cart', component: ShoppingCart, name:'ShoppingCart'},

        ]
    })

    const vue = new Vue({
        router
    }).$mount('#app');
let openShopping = document.querySelector('.shopping');
let closeShopping = document.querySelector('.closeShopping');
let list = document.querySelector('.list');
let listCart = document.querySelector('.listCart');
let body = document.querySelector('body');
let total = document.querySelector('.total');
let quantity = document.querySelector('.quantity');

openShopping.addEventListener('click', () => {
    body.classList.add('active');
});

closeShopping.addEventListener('click', () => {
    body.classList.remove('active');
});

let products = [
    {
        id: 1,
        name: 'Red Car',
        image: '1.png',
        price: 7.99
    },
    {
        id: 2,
        name: 'Rubiks Cube',
        image: '2.png',
        price: 5.50
    },
    {
        id: 3,
        name: 'Foot Ball',
        image: '3.png',
        price: 29.99
    },
    {
        id: 4,
        name: 'Foot Bicycle',
        image: '4.png',
        price: 22.95
    },
    {
        id: 5,
        name: 'Excavator',
        image: '5.png',
        price: 10.99
    },
    {
        id: 6,
        name: 'Toy Blocks',
        image: '6.png',
        price: 11.99
    }
];
let listCarts = [];

function initApp() {
    products.forEach((value, key) => {
        let newDiv = document.createElement('div');
        newDiv.classList.add('item');
        newDiv.innerHTML = `
            <img src="image/${value.image}" alt="${value.name}">
            <div class="title">${value.name}</div>
            <div class="price">$${value.price.toFixed(2)}</div>
            <button onclick="addToCart(${key})">Add To Cart</button>`;
        list.appendChild(newDiv);
    });
}

function addToCart(key) {
    if (listCarts[key] == null) {
        listCarts[key] = { ...products[key], quantity: 1 };
    } else {
        listCarts[key].quantity++;
    }
    reloadCart();
}

function reloadCart() {
    listCart.innerHTML = '';
    let count = 0;
    let totalPrice = 0;
    listCarts.forEach((value, key) => {
        totalPrice += value.price * value.quantity;
        count += value.quantity;
        if (value != null) {
            let newLi = document.createElement('li');
            newLi.innerHTML = `
                <div><img src="image/${value.image}" alt="${value.name}"></div>
                <div>${value.name}</div>
                <div>$${(value.price * value.quantity).toFixed(2)}</div>
                <div>
                    <button onclick="changeQuantity(${key}, ${value.quantity - 1})">-</button>
                    <div class="count">${value.quantity}</div>
                    <button onclick="changeQuantity(${key}, ${value.quantity + 1})">+</button>
                </div>`;
            listCart.appendChild(newLi);
        }
    });
    total.innerText = `$${totalPrice.toFixed(2)}`;
    quantity.innerText = count;
}

function changeQuantity(key, quantity) {
    if (quantity <= 0) {
        delete listCarts[key];
    } else {
        listCarts[key].quantity = quantity;
    }
    reloadCart();
}

// Event listener for payment form submission
document.getElementById('paymentForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent default form submission
    
    // Simulate payment processing (replace with actual logic)
    alert('Payment successful! Thank you for shopping with us.');

    // Optional: Clear form fields after successful payment
    clearPaymentForm();
});

function clearPaymentForm() {
    document.getElementById('cardNumber').value = '';
    document.getElementById('cardName').value = '';
    document.getElementById('expiry').value = '';
    document.getElementById('cvv').value = '';
}

// Initialize the application
initApp();

// document.addEventListener('DOMContentLoaded', function () {
//     console.log('hi');
function addToCart(itemId) {
    const cartCountItems = document.querySelector("#cartCountItems");
    const addCartBtn = document.querySelector(`#addToCart_${itemId}`);
    const removeCartBtn = document.querySelector(`#removeFromCart_${itemId}`);

    fetch(`/cart/addtocart/${itemId}/`)
        .then(response => response.json())
        .then(data => {
            console.log(data);
            if (data['success']) {
                cartCountItems.innerHTML = data['countItems'];
                addCartBtn.classList.add('hide');
                removeCartBtn.classList.remove('hide');
            }
        })
        .catch(err => console.log(err));
}

function removeFromCart(itemId) {
    const cartCountItems = document.querySelector("#cartCountItems");
    const addCartBtn = document.querySelector(`#addToCart_${itemId}`);
    const removeCartBtn = document.querySelector(`#removeFromCart_${itemId}`);

    fetch(`/cart/removefromcart/${itemId}/`)
        .then(response => response.json())
        .then(data => {
            console.log(data);
            if (data['success']) {
                cartCountItems.innerHTML = data['countItems'];
                removeCartBtn.classList.add('hide');
                addCartBtn.classList.remove('hide');
            }
        })
        .catch(err => console.log(err));
}

const cartMainPage = {
    conversionPrice: function (itemId) {
        let currentValue = document.querySelector(`#itemCnt_${itemId}`).value;
        const price = document.querySelector(`#itemPrice_${itemId}`).innerHTML;
        const totalPrice = document.querySelector(`#itemTotalPrice_${itemId}`);

        if (!currentValue || currentValue < 0 || isNaN(currentValue)) {
            totalPrice.innerHTML = 'с числом проблема';
        } else {
            totalPrice.innerHTML = currentValue * price;
        }
    },
    plusOneItem: function (itemId) {
        let itemsCount = document.querySelector(`#itemCnt_${itemId}`);
        if (itemsCount.value >= 0) {
            itemsCount.value = Number(itemsCount.value) + 1;
        }
        cartMainPage.conversionPrice(itemId);
    },
    minusOneItem: function (itemId) {
        let itemsCount = document.querySelector(`#itemCnt_${itemId}`);
        if (itemsCount.value > 0) {
            itemsCount.value = Number(itemsCount.value) - 1;
        }
        cartMainPage.conversionPrice(itemId);
    }
}

function getData(objForm) {
    let hData = {};

    const inputs = objForm.getElementsByTagName('input');
    const textareas = objForm.getElementsByTagName('textarea');
    const selects = objForm.getElementsByTagName('select');
    [...inputs, ...textareas, ...selects].forEach((el, idx) => {
        if (el.name && el.name !== '') {
            hData[el.name] = el.value;
            console.log(`hData[${el.name}] = ${hData[el.name]}`);
        }
    });
    return hData;
}

function registerNewUser() {
    let postData = getData(document.getElementById('registerBox'));
    fetch(`/user/register/`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(postData)
    })
        .then(response => response.json())
        .then(data => {
            console.log(data);
            if (data['success']) {
                alert('Регистрация прошла успешно');
                document.getElementById('registerBox').classList.add('hide');
            } else {
                alert(data['message']);
            }
        })
}

// });



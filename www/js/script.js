const cartInteractions = {
    removeFromCart: function(itemId) {
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
},
    addToCart: function(itemId) {
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
const user = {
    registerNewUser: function() {
    let postData = utils.getData(document.getElementById('registerBox'));
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
                document.getElementById('userLink').innerText = `Пользователь: ${data['userName']}`;
                document.getElementById('userBox').classList.remove('hide');

                //order page
                document.getElementById('loginBox').classList.add('hide');
                document.getElementById('btnSaveOrder').classList.remove('hide');
            } else {
                alert(data['message']);
            }
        })
},
    login: function() {
    let postData = utils.getData(document.getElementById('loginBox'));
    fetch(`/user/login/`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(postData)
    })
        .then(response => response.json())
        .then(data => {
            console.log('data', data);
            if (data['success']) {
                document.getElementById('registerBox').classList.add('hide');
                document.getElementById('loginBox').classList.add('hide');
                document.getElementById('userLink').innerText = `Пользователь: ${data['userName']}`;
                document.getElementById('userBox').classList.remove('hide');
                document.getElementById('btnSaveOrder').classList.remove('hide');

                //filling fields on order page
                document.getElementById('name').value = data['userName'];
                document.getElementById('phone').value = data['phone'];
                document.getElementById('address').value = data['address'];


            } else {
                alert(data['message'])
            }

        })
},
    updateUserData: function() {
    let postData = utils.getData(document.getElementById('tableUserData'));
    fetch(`/user/update/`, {
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
                document.getElementById('userLink').innerHTML = `Пользователь: ${data['userName']}`;
            }
            alert(data['message']);
        });

}
}
const utils = {
    getData: function(objForm) {
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
},
    showRegisterBox: function() {
    const registerBoxHidden = document.getElementById('registerBoxHidden');
    const arr = [...registerBoxHidden.classList];
    if (arr.includes('hide')) {
        registerBoxHidden.classList.remove('hide');
    } else {
        registerBoxHidden.classList.add('hide');
    }
}
}
const orders = {
    saveOrder: function () {
        const postData = utils.getData(document.getElementById('orderForm'));
        fetch(`/cart/saveorder/`, {
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
                    alert(data['message']);
                    document.location = '/';
                } else {
                    alert(data['message']);
                }
            })
    }
}





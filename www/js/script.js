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

function conversionPrice(itemId) {
    let currentValue = document.querySelector(`#itemCnt_${itemId}`).value;
    const price = document.querySelector(`#itemPrice_${itemId}`).innerHTML;
    const totalPrice = document.querySelector(`#itemTotalPrice_${itemId}`);

    totalPrice.innerHTML = currentValue * price;
}

function plusOneItem(itemId) {
    let itemsCount = document.querySelector(`#itemCnt_${itemId}`);
    itemsCount.value = Number(itemsCount.value) + 1;
    conversionPrice(itemId);
}
function minusOneItem(itemId) {
    let itemsCount = document.querySelector(`#itemCnt_${itemId}`);
    if(itemsCount.value > 0){
        itemsCount.value = Number(itemsCount.value) - 1;
    }
    conversionPrice(itemId);
}
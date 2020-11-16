function addToCart(itemId) {
    const cartCountItems = document.querySelector("#cartCountItems");
    const addCartBtn = document.querySelector(`#addCart_${itemId}`);
    const removeCartBtn = document.querySelector(`#removeCart_${itemId}`);

    fetch(`/cart/addtocart/${itemId}/`)
        .then(response => response.json())
        .then(data => {
            console.log(data);
            if (data['success']) {
                cartCountItems.innerHTML = data['countItems'];
                addCartBtn.classList.add('hide');

                removeCartBtn.classList.remove('hide');
                removeCartBtn.classList.add('show');
            }
        })
        .catch(err => console.log(err));
}

function removeFromCart(itemId){
    const cartCountItems = document.querySelector("#cartCountItems");
    const addCartBtn = document.querySelector(`#addCart_${itemId}`);
    const removeCartBtn = document.querySelector(`#removeCart_${itemId}`);

    fetch(`/cart/removefromcart/${itemId}/`)
        .then(response => response.json())
        .then(data => {
            console.log(data);
            if (data['success']) {
                cartCountItems.innerHTML = data['countItems'];
                removeCartBtn.classList.add('hide');
                addCartBtn.classList.remove('hide');
                addCartBtn.classList.add('show');
            }
        })
        .catch(err => console.log(err));
}
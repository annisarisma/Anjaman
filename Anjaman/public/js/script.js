// Counting change action inside /cart/show page
$(document).ready(function () {
    let cartShow = document.querySelector('.cart-show')
    if (cartShow) {
        let productQuantities = cartShow.querySelectorAll('.product-quantity')
        let productPrices = cartShow.querySelectorAll('.product-price')
        let summaryPrice = cartShow.querySelector('.summary-price')
        let sumaaryItem = cartShow.querySelector('.summary-item')
        let summaryTotal = cartShow.querySelector('.summary-total')

        function cartShowCountTotal() {
            let totalPrice = 0
            let totalItem = 0
            let total = 0
            for (let i = 0; i < productQuantities.length; i++) {
                let quantity = productQuantities[i]
                let price = productPrices[i]
                totalItem += parseInt(quantity.value)
                totalPrice += parseInt(quantity.value) * parseInt(price.innerHTML)
                total += parseInt(productPrices.innerHTML)
            }
            sumaaryItem.innerHTML = totalItem
            summaryPrice.innerHTML = 'Rp. ' + totalPrice
        };

        productQuantities.forEach(element => {
            element.addEventListener('change', function () {
                cartShowCountTotal()
            })
        })
    }
})
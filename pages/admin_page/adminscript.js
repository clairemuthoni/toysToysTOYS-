const category = document.getElementById('new-category') 

const item_name = document.getElementById('item-name')

const item_price = document.getElementById('item-price')

const item_quantity = document.getElementById('item-quantity')

const first_name = document.getElementById('first_name')

const last_name = document.getElementById('last_name')

const email = document.getElementById('email')

const password = document.getElementById('password')

const buyer = document.getElementById('buyer-btn')

const seller = document.getElementById('seller-btn')

const form_cat = document.getElementById('form-category')

const form_prod = document.getElementById('form-product')

const form_user = document.getElementById('form-users')

form_cat.addEventListener('submit', (e) => {

    let messages = []
    if(category.value == '' || category.value == null){
        messages.push('Category name is required')
    }

    if(messages.length > 0){
        e.preventDefault()
        errorElement.innerText = messages.join(' ,')
    }

})

form_prod.addEventListener('submit', (e) => {

    let messages = []
    if(item_name.value == '' || item_name.value == null){
        messages.push('Item name is required')
    }
    else if(item_price.value == '' || item_price.value == null){
        messages.push('Item price is required')
    }
    else if(item_quantity.value == '' || item_quantity.value == null){
        messages.push('Item quantity is required')
    }

    if(messages.length > 0){
        e.preventDefault()
    }

})

form_user.addEventListener('submit', (e) => {

    let messages = []
    if(first_name.value == '' || first_name.value == null){
        messages.push('First name is required')
    }
    else if(last_name.value == '' || last_name.value == null){
        messages.push('Last name is required')
    }
    else if(email.value == '' || email.value == null){
        messages.push('email is required')
    }
    else if(password.value == '' || password.value == null){
        messages.push('password is required')
    }
    else if(buyer.value == null && seller.value == null){
        messages.push('This field is required')
    }

    if(messages.length > 0){
        e.preventDefault()
    }

})
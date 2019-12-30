// const addUser = document.querySelector('#addUser');
const AddUserForm = document.querySelector('#AddUserForm');
const form = document.querySelector('#form');
const dropdownCard = document.querySelector('#dropdownCard');
const closeDropdown = document.querySelector('#closeDropdown');



form.addEventListener('click', function () {
    event.preventDefault();

    dropdownCard.style.display = "block";
});

closeDropdown.addEventListener('click', function () {
    event.preventDefault();

    // AddUserForm.style.display = "none";
    dropdownCard.style.display = "none";
});
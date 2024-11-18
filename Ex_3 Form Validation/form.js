const form = document.getElementById('form');
const studentName = document.getElementById('student_name');
const registerNumber = document.getElementById('register_number');
const department = document.getElementById('department');
const section = document.getElementById('section');
const email = document.getElementById('email');
const address = document.getElementById('address');
const city = document.getElementById('city');
const country = document.getElementById('country');
const pincode = document.getElementById('pincode');

form.addEventListener('submit', function(e) {
    e.preventDefault();
    validateInputs();
});

function validateInputs() {
    const studentNameVal = studentName.value.trim();
    const registerNumberVal = registerNumber.value.trim();
    const departmentVal = department.value.trim();
    const sectionVal = section.value.trim();
    const emailVal = email.value.trim();
    const addressVal = address.value.trim();
    const cityVal = city.value.trim();
    const countryVal = country.value.trim();
    const pincodeVal = pincode.value.trim();

    if (studentNameVal === '') {
        showError(studentName, 'Student Name is required');
    } else {
        setSuccess(studentName);
    }

    if (registerNumberVal === '') {
        showError(registerNumber, 'Register Number is required');
    } else {
        setSuccess(registerNumber);
    }

    if (departmentVal === '') {
        showError(department, 'Department is required');
    } else {
        setSuccess(department);
    }

    if (sectionVal === '') {
        showError(section, 'Section is required');
    } else {
        setSuccess(section);
    }

    if (emailVal === '') {
        showError(email, 'Email is required');
    } else if (!validateEmail(emailVal)) {
        showError(email, 'Enter a valid email');
    } else {
        setSuccess(email);
    }

    if (addressVal === '') {
        showError(address, 'Address is required');
    } else {
        setSuccess(address);
    }

    if (cityVal === '') {
        showError(city, 'City is required');
    } else {
        setSuccess(city);
    }

    if (countryVal === '') {
        showError(country, 'Country is required');
    } else {
        setSuccess(country);
    }

    if (pincodeVal === '' || !validatePincode(pincodeVal)) {
        showError(pincode, 'Enter a valid pincode');
    } else {
        setSuccess(pincode);
    }
}

function showError(element, message) {
    const formControl = element.parentElement;
    const errorElement = formControl.querySelector('.error');

    errorElement.innerText = message;
    formControl.classList.add('error');
    formControl.classList.remove('success');
}

function setSuccess(element) {
    const formControl = element.parentElement;
    const errorElement = formControl.querySelector('.error');

    errorElement.innerText = '';
    formControl.classList.add('success');
    formControl.classList.remove('error');
}

function validateEmail(email) {
    const regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    return regex.test(email);
}

function validatePincode(pincode) {
    const regex = /^[0-9]{6}$/;
    return regex.test(pincode);
}

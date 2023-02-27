let initPerson; // объект перенесен в глобальные, для того, чтобы можно было выполнить удаление по кнопке

window.onload = function()
{
    initPerson = personGenerator.getPerson();
    document.getElementById('genderOutput').innerText = initPerson.gender;
    document.getElementById('firstNameOutput').innerText = initPerson.firstName;
    document.getElementById('secondNameOutput').innerText = initPerson.secondName;
    document.getElementById('surnameOutput').innerText = initPerson.surname;
    document.getElementById('professionOutput').innerText = initPerson.profession;
    document.getElementById('birthYearOutput').innerText = initPerson.dateBirth;
};

document.getElementById('btnGenerator').addEventListener('click', function () {
    window.onload();
    console.log(initPerson);
})

document.getElementById('btnDelete').addEventListener('click', function () {
    personGenerator.delPerson();
    console.log(initPerson);
})
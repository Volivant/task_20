const personGenerator = {
    surnameJson: `{  
        "count": 15,
        "list": {
            "id_1": "Иванов",
            "id_2": "Смирнов",
            "id_3": "Кузнецов",
            "id_4": "Васильев",
            "id_5": "Петров",
            "id_6": "Михайлов",
            "id_7": "Новиков",
            "id_8": "Федоров",
            "id_9": "Кравцов",
            "id_10": "Николаев",
            "id_11": "Семёнов",
            "id_12": "Славин",
            "id_13": "Степанов",
            "id_14": "Павлов",
            "id_15": "Александров",
            "id_16": "Морозов"
        }
    }`,
    firstNameMaleJson: `{
        "count": 10,
        "list": {     
            "id_1": "Александр",
            "id_2": "Максим",
            "id_3": "Иван",
            "id_4": "Артем",
            "id_5": "Дмитрий",
            "id_6": "Никита",
            "id_7": "Михаил",
            "id_8": "Даниил",
            "id_9": "Егор",
            "id_10": "Андрей"
        }
    }`,
    firstNameFemaleJson: `{
        "count": 10,
        "list": {     
            "id_1": "Ольга",
            "id_2": "Мария",
            "id_3": "Анна",
            "id_4": "Полина",
            "id_5": "Татьяна",
            "id_6": "Елена",
            "id_7": "Светлана",
            "id_8": "Анастасия",
            "id_9": "Надежда",
            "id_10": "Ксения"
        }
    }`,
    genderJson: `{
        "count": 2,
        "list": {     
            "id_1": "Мужчина",
            "id_2": "Женщина"
        }
    }`,
    proffessionMaleJson: `{
        "count": 5,
        "list": {     
            "id_1": "Адвокат",
            "id_2": "Шахтер",
            "id_3": "Машинист",
            "id_4": "Учитель",
            "id_5": "Бухгалтер"
        }
    }`,
    proffessionFemaleJson: `{
        "count": 4,
        "list": {     
            "id_1": "Адвокат",
            "id_2": "Балерина",
            "id_3": "Учитель",
            "id_4": "Бухгалтер"
        }
    }`,

    randomIntNumber: (max = 1, min = 0) => Math.floor(Math.random() * (max - min + 1) + min),

    randomValue: function (json) {
        const obj = JSON.parse(json);
        const prop = `id_${this.randomIntNumber(obj.count, 1)}`;  // this = personGenerator
        return obj.list[prop];
    },

    randomGender: function() {
        return this.randomValue(this.genderJson);
    },


    randomFirstName: function(genderInput) {
        if (genderInput == "Мужчина") { // генерация мужчин
            return this.randomValue(this.firstNameMaleJson);
        }
        else {                          // генерация женщин
            return this.randomValue(this.firstNameFemaleJson);
        }
    },

    randomSurname: function(genderInput) {
        if (genderInput == "Мужчина") { // генерация мужчин
            return this.randomValue(this.surnameJson);
        }
        else {                          // генерация женщин
            return this.randomValue(this.surnameJson)+"а";
        }
    },

    randomProfession: function(genderInput) {
        if (genderInput == "Мужчина") { // генерация мужчин
            return this.randomValue(this.proffessionMaleJson);
        }
        else {                          // генерация женщин
            return this.randomValue(this.proffessionFemaleJson);
        }
    },

    randomSecondName: function(genderInput) {
        let secondNameBase = this.randomValue(this.firstNameMaleJson);
        let endName = secondNameBase.substring(secondNameBase.length-1);

        switch (endName) {
            case "й":
                if (genderInput == "Мужчина") { // генерация мужчин
                    return secondNameBase.substring(0, secondNameBase.length-1) + "евич";
                }
                else {                          // генерация женщин
                    return secondNameBase.substring(0, secondNameBase.length-1) + "евна";
                }
                break;
            case "a":
                if (genderInput == "Мужчина") { // генерация мужчин
                    return secondNameBase.substring(0, secondNameBase.length-1) + "ович";
                }
                else {                          // генерация женщин
                    return secondNameBase.substring(0, secondNameBase.length-1) + "овна";
                }
                break;
            default:
                if (genderInput == "Мужчина") { // генерация мужчин
                    return secondNameBase + "ович";
                }
                else {                          // генерация женщин
                    return secondNameBase + "овна";
                }
        }

    },

    randomDateBirth: function() {
        let yearBirth = this.randomIntNumber(2002, 1957);
        let monthBirth = this.randomIntNumber(12, 1);
        let dayBirth;

        switch (monthBirth) { //генерация дня месяца
            case (1 || 3 || 5 || 7 || 8 || 10 || 12):
                dayBirth = this.randomIntNumber(31, 1);
                break;
            case 2:
                dayBirth = this.randomIntNumber(28, 1);
                break;
            default:
                dayBirth = this.randomIntNumber(30, 1);
        }

        switch (monthBirth) { //сборка даты рождения
            case 1:
                return String(dayBirth) + " января " + String(yearBirth) + " года";
                break;
            case 2:
                return String(dayBirth) + " февраля " + String(yearBirth) + " года";
                break;
            case 3:
                return String(dayBirth) + " марта " + String(yearBirth) + " года";
                break;
            case 4:
                return String(dayBirth) + " апреля " + String(yearBirth) + " года";
                break;
            case 5:
                return String(dayBirth) + " мая " + String(yearBirth) + " года";
                break;
            case 6:
                return String(dayBirth) + " июня " + String(yearBirth) + " года";
                break;
            case 7:
                return String(dayBirth) + " июля " + String(yearBirth) + " года";
                break;
            case 8:
                return String(dayBirth) + " августа " + String(yearBirth) + " года";
                break;
            case 9:
                return String(dayBirth) + " сентября " + String(yearBirth) + " года";
                break;
            case 10:
                return String(dayBirth) + " октября " + String(yearBirth) + " года";
                break;
            case 11:
                return String(dayBirth) + " ноября " + String(yearBirth) + " года";
                break;
            default:
                return String(dayBirth) + " декабря " + String(yearBirth) + " года";
        }
    },

    getPerson: function () {
        this.person = {};
        this.person.gender = this.randomGender();
        this.person.surname = this.randomSurname(this.person.gender);
        this.person.firstName = this.randomFirstName(this.person.gender);
        this.person.secondName = this.randomSecondName(this.person.gender);
        this.person.profession = this.randomProfession(this.person.gender);
        this.person.dateBirth = this.randomDateBirth();
        return this.person;
    },

    delPerson: function () {
        delete this.person.gender;
        delete this.person.surname;
        delete this.person.firstName;
        delete this.person.secondName;
        delete this.person.profession;
        delete this.person.dateBirth;
        return this.person;
    }
};

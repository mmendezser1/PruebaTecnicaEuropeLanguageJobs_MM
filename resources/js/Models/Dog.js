class Dog {
    id;
    image;
    name;
    age_months;
    race;
    size;
    hair_color;
    hair_style;
    constructor(
        id,
        image,
        name,
        age_months,
        race,
        size,
        hair_color,
        hair_style
    ) {
        this.id = id;
        this.image = image;
        this.name = name;
        this.age_months = age_months;
        this.race = race;
        this.size = size;
        this.hair_color = hair_color;
        this.hair_style = hair_style;
    }
}

export default Dog;

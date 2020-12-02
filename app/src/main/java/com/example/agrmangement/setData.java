package com.example.agrmangement;

public class setData {
    String name,description,image;
    setData(String name,String description,String image){
        this.name=name;
        this.description=description;
        this.image=image;
    }

    public String getImage() {
        return image;
    }

    public String getDescription() {
        return description;
    }

    public String getName() {
        return name;
    }
}

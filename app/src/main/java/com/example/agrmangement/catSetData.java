package com.example.agrmangement;

public class catSetData {
    String catName,description,image;
    catSetData(String catName,String description,String image){
        this.catName=catName;
        this.description=description;
        this.image=image;
    }

    public String getCatName() {
        return catName;
    }

    public String getDescription() {
        return description;
    }

    public String getImage() {
        return image;
    }
}

package com.example.agrmangement;

public class catSetData {
    String catName,description,image,qty,price,id;
    catSetData(String catName,String description,String image,String id,String qty,String price){
        this.catName=catName;
        this.description=description;
        this.image=image;
        this.qty=qty;
        this.price=price;
        this.id=id;
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

    public String getQty() {
        return qty;
    }

    public String getId() {
        return id;
    }

    public String getPrice() {
        return price;
    }
}

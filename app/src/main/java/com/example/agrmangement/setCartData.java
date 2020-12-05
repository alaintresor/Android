package com.example.agrmangement;

public class setCartData {

    String id,image,name,status,category,price,qty;

    public setCartData(String id,String image,String name,String status,String category,String price,String qty){
        this.id=id;
        this.image=image;
        this.name=name;
        this.status=status;
        this.category=category;
        this.price=price;
        this.qty=qty;
    }

    public String getId() {
        return id;
    }

    public String getImage() {
        return image;
    }

    public String getName() {
        return name;
    }

    public String getStatus() {
        return status;
    }

    public String getCategory() {
        return category;
    }

    public String getPrice() {
        return price;
    }

    public String getQty() {
        return qty;
    }
}

package com.example.agrmangement;

import static java.lang.Integer.parseInt;

public class setCartData {

    String id,image,name,status,category,price,qty;
    int payOut=0;
    public setCartData(String id,String image,String name,String status,String category,String price,String qty){
        this.id=id;
        this.image=image;
        this.name=name;
        this.status=status;
        this.category=category;
        this.price=price;
        this.qty=qty;
        this.payOut=this.payOut+1;
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

    public void addToQty() {
        this.qty= String.valueOf(parseInt(this.qty)+1);
    }
    public void reduceToQty() {
        this.qty= String.valueOf(parseInt(this.qty)-1);
    }

    public int getPayOut() {
        return payOut;
    }
}

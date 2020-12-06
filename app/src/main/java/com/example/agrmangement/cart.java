package com.example.agrmangement;

import androidx.appcompat.app.AppCompatActivity;

import android.os.Bundle;
import android.widget.ListView;

import java.util.ArrayList;
import java.util.List;

public class cart extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_cart);

        final List<setCartData> setCartData;
        setCartData = new ArrayList<>();
        final ListView listView = (ListView) findViewById(R.id.cartList);

        setCartData.add(new setCartData("1", "", "Ibijumba","id","qty","price",""));
        setCartData.add(new setCartData("1", "", "Ibijumba","id","qty","price",""));
        setCartData.add(new setCartData("1", "", "Ibijumba","id","qty","price",""));
        setCartData.add(new setCartData("1", "", "Ibijumba","id","qty","price",""));
        setCartData.add(new setCartData("1", "", "Ibijumba","id","qty","price",""));

        cartAdpter cartAdpter = new cartAdpter(getApplicationContext(), R.layout.cart_item, setCartData);
        listView.setAdapter(cartAdpter);
    }
}
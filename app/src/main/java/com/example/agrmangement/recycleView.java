package com.example.agrmangement;

import androidx.appcompat.app.AppCompatActivity;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import android.os.Bundle;

import java.util.ArrayList;
import java.util.List;

public class recycleView extends AppCompatActivity {
      RecyclerView recyclerView;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_recycle_view);
        recyclerView=findViewById(R.id.recycleView);

        final List<setCartData> setCartData;
        setCartData = new ArrayList<>();

        setCartData.add(new setCartData("1", "1", "", "proName", "u", "qty", "450", "4", "50"));

        MyAdapter myAdapter=new MyAdapter(this,setCartData);
        recyclerView.setAdapter(myAdapter);
        //recyclerView.setLayoutManager(new LinearLayoutManager(this));
    }
}
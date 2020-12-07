package com.example.agrmangement;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.AdapterView;
import android.widget.GridView;

public class SingleCategory extends AppCompatActivity {
    GridView gridView;
    int images[]= {R.drawable.ic_add_shopping_cart,R.drawable.ic_add_shopping_cart,R.drawable.a1,
    R.drawable.a2,R.drawable.a3,R.drawable.ic_email};

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_single_category);
        getSupportActionBar().setTitle("Products");
        gridView = (GridView) findViewById(R.id.gridView);
        //create gridView Adpter Object
        GridAdpter gridAdpter = new GridAdpter(getApplicationContext(),images);
        //set adpter to gridView
        gridView.setAdapter(gridAdpter);
        gridView.setOnItemClickListener(new AdapterView.OnItemClickListener() {
            @Override
            public void onItemClick(AdapterView<?> parent, View view, int position, long id) {
                Intent intent = new Intent(SingleCategory.this,ProductDetail.class);
                intent.putExtra("images",images[position]);
                startActivity(intent);
            }
        });
    }
}
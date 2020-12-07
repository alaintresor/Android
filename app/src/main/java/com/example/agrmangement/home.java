package com.example.agrmangement;

import android.content.Intent;
import android.os.Bundle;
import android.os.PersistableBundle;
import android.view.View;
import android.widget.Button;

import androidx.annotation.Nullable;
import androidx.appcompat.app.ActionBar;
import androidx.appcompat.app.AppCompatActivity;

import java.util.ArrayList;
import java.util.List;

public class home extends AppCompatActivity {
    @Override
    public void onCreate(Bundle savedInstanceState) {
        final List<catSetData> catSetData;
        catSetData = new ArrayList<>();
        super.onCreate(savedInstanceState);
        setContentView(R.layout.home);
        ActionBar actionBar = getSupportActionBar();
        actionBar.setHomeButtonEnabled(true);
        actionBar.setDisplayHomeAsUpEnabled(true);

        //get User Id
        final String userId=getIntent().getStringExtra("userId");

        Button button=(Button)findViewById(R.id.btn1);
        Button cart=(Button)findViewById(R.id.toBook);
        button.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intent=new Intent(home.this,product.class);
                intent.putExtra("userId",userId);
                startActivity(intent);


            }
        });

        cart.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intent=new Intent(home.this,cart.class);
                intent.putExtra("userId",userId);
                startActivity(intent);


            }
        });
    }
}

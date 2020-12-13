package com.example.agrmangement;

import android.content.Intent;
import android.os.Bundle;
import android.os.PersistableBundle;
import android.view.Menu;
import android.view.MenuInflater;
import android.view.MenuItem;
import android.view.View;
import android.widget.Button;

import androidx.annotation.NonNull;
import androidx.annotation.Nullable;
import androidx.appcompat.app.ActionBar;
import androidx.appcompat.app.AppCompatActivity;
import androidx.appcompat.widget.Toolbar;

import java.util.ArrayList;
import java.util.List;

public class home extends AppCompatActivity {
    @Override
    public void onCreate(Bundle savedInstanceState) {
        final List<catSetData> catSetData;
        catSetData = new ArrayList<>();
        super.onCreate(savedInstanceState);
        setContentView(R.layout.home);

        Toolbar toolbar =(Toolbar) findViewById(R.id.toolbar);
        toolbar.setTitle("Huye Farm Online Shop");

        setSupportActionBar(toolbar);

        //get User Id
        final String userId=getIntent().getStringExtra("userId");

        Button button=(Button)findViewById(R.id.btn1);
        Button cart=(Button)findViewById(R.id.toBook);
        button.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intent=new Intent(home.this,product.class);
                intent.putExtra("userId",userId);
                intent.putExtra("status","available");
                startActivity(intent);


            }
        });

        cart.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intent=new Intent(home.this,product.class);
                intent.putExtra("userId",userId);
                intent.putExtra("status","unavailable");
                startActivity(intent);


            }
        });
    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        MenuInflater menuInflater = getMenuInflater();
        menuInflater.inflate(R.menu.bottom_nav_menu, menu);
        return true;
    }

    @Override
    public boolean onOptionsItemSelected(@NonNull MenuItem item) {
        switch (item.getItemId()){
            case R.id.shop_cart:
                Intent intent = new Intent(getApplicationContext(),cart.class);
                final String userId=getIntent().getStringExtra("userId");
                intent.putExtra("userId",userId);
                startActivity(intent);
                break;
        }
        return super.onOptionsItemSelected(item);
    }
}

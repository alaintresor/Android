package com.example.agrmangement;

import android.content.Intent;
import android.os.Bundle;
import android.os.PersistableBundle;
import android.view.View;
import android.widget.Button;

import androidx.annotation.Nullable;
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
        Button button=(Button)findViewById(R.id.btn1);
        button.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intent=new Intent(getApplicationContext(),product.class);
                startActivity(intent);
                finish();
                catSetData.add(new catSetData("name", "description", "","id","qty","price"));
            }
        });
    }
}

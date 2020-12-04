package com.example.agrmangement;

import androidx.appcompat.app.ActionBar;
import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.LinearLayout;
import android.widget.ListView;

import java.util.ArrayList;
import java.util.List;

public class product extends AppCompatActivity {
LinearLayout linearLayout;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_product);
        ActionBar actionBar = getSupportActionBar();
        actionBar.setHomeButtonEnabled(true);
        actionBar.setDisplayHomeAsUpEnabled(true);
        linearLayout=(LinearLayout)findViewById(R.id.cat1);
        linearLayout.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(product.this,SingleCategory.class);
                startActivity(intent);
            }
        });
        ListView listView=(ListView)findViewById(R.id.MyList);

        String data1="IMBUTO";
        String data2="IMBOGA";
        String data3="AMATUNGO";
        String data4="IMBUTO";
        String data5="IMBUTO";
        final List<catSetData> catSetData;
        catSetData = new ArrayList<>();
        catSetData.add(new catSetData(data1));
        catSetData.add(new catSetData(data2));
        catSetData.add(new catSetData(data3));
        catSetData.add(new catSetData(data1));

        catAdpter catAdpter = new catAdpter(this, R.layout.recentpro, catSetData);
        listView.setAdapter(catAdpter);
    }
}
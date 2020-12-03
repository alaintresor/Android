package com.example.agrmangement;

import androidx.appcompat.app.AppCompatActivity;

import android.os.Bundle;
import android.widget.ListView;

import java.util.ArrayList;
import java.util.List;

public class product extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_product);
        ListView listView=(ListView)findViewById(R.id.MyList);

        String data1="IMBUTO";
        String data2="IMBOGA";
        String data3="AMATUNGO";
        String data4="IMBUTO";
        String data5="IMBUTO";
        final List<catSetData> catSetData;
        catSetData = new ArrayList<>();
        catSetData.add(new catSetData(data1));
        catSetData.add(new catSetData(data1));
        catSetData.add(new catSetData(data1));
        catSetData.add(new catSetData(data1));

        catAdpter catAdpter = new catAdpter(this, R.layout.recentpro, catSetData);
        listView.setAdapter(catAdpter);
    }
}
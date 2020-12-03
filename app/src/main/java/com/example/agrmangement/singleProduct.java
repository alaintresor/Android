package com.example.agrmangement;

import androidx.appcompat.app.AppCompatActivity;

import android.os.Bundle;
import android.widget.ListView;

import java.util.ArrayList;
import java.util.List;

public class singleProduct extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_single_product);
        ListView listView = (ListView) findViewById(R.id.list);
        final List<setSimilarData> setSimilarData;
        setSimilarData = new ArrayList<>();
        setSimilarData.add(new setSimilarData("umuceri"));
        setSimilarData.add(new setSimilarData("ibyumbati"));
        setSimilarData.add(new setSimilarData("umuceri"));
        setSimilarData.add(new setSimilarData("ibyumbati"));
        SimilarAdpter similarAdpter = new SimilarAdpter(this, R.layout.similarpro, setSimilarData);
        listView.setAdapter(similarAdpter);
    }
}
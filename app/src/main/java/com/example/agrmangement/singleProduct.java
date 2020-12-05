package com.example.agrmangement;

import androidx.appcompat.app.AppCompatActivity;

import android.os.Bundle;
import android.widget.ImageView;
import android.widget.ListView;
import android.widget.TextView;

import com.squareup.picasso.Picasso;

import java.util.ArrayList;
import java.util.List;

public class singleProduct extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_single_product);
        ListView listView = (ListView) findViewById(R.id.list);
        ImageView imagePro=(ImageView) findViewById(R.id.imagepro);
        TextView namePro=(TextView)findViewById(R.id.name);
        TextView productDlts=(TextView)findViewById(R.id.productDlts);
        TextView available=(TextView)findViewById(R.id.available);
        TextView UP=(TextView)findViewById(R.id.Uprice);




//        Get data form product activity
        String name=getIntent().getStringExtra("name");
        String image=getIntent().getStringExtra("image");
        String description=getIntent().getStringExtra("description");
        String avble=getIntent().getStringExtra("qty");
        String price=getIntent().getStringExtra("price");

        namePro.setText(name);
        productDlts.setText(description);
        available.setText(avble);
        UP.setText(price);
        Picasso.get().load(image).into(imagePro);


//        Similar Products
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
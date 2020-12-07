package com.example.agrmangement;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.os.Handler;
import android.os.Looper;
import android.view.View;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.ListView;
import android.widget.TextView;
import android.widget.Toast;

import com.squareup.picasso.Picasso;
import com.vishnusivadas.advanced_httpurlconnection.PutData;

import java.util.ArrayList;
import java.util.List;

public class singleProduct extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_single_product);
        final ListView listView = (ListView) findViewById(R.id.list);
        final ImageView imagePro = (ImageView) findViewById(R.id.imagepro);
        final TextView namePro = (TextView) findViewById(R.id.name);
        final TextView productDlts = (TextView) findViewById(R.id.productDlts);
        final TextView available = (TextView) findViewById(R.id.available);
        final TextView qtyInput = (TextView) findViewById(R.id.qty);
        final TextView UP = (TextView) findViewById(R.id.Uprice);
        Button addCart = (Button) findViewById(R.id.addToCart);


//        Get data form product activity
        final String userId = getIntent().getStringExtra("userId");
        final String proId = getIntent().getStringExtra("proId");
        final String name = getIntent().getStringExtra("name");
        final String image = getIntent().getStringExtra("image");
        final String description = getIntent().getStringExtra("description");
        final String avble = getIntent().getStringExtra("qty");
        final String price = getIntent().getStringExtra("price");

        //get Qty
        //final String qty = String.valueOf(qtyInput.getText());

//        final String username= String.valueOf(user.getText());

        //add to cart
        addCart.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                if (!qtyInput.getText().toString().equals("")) {

                    Handler handler = new Handler(Looper.getMainLooper());

                    handler.post(new Runnable() {
                        @Override
                        public void run() {
                            //Starting Write and Read data with URL
                            //Creating array for parameters

                            String[] field = new String[6];
                            field[0] = "userId";
                            field[1] = "proId";
                            field[2] = "proImage";
                            field[3] = "proName";
                            field[4] = "proPrice";
                            field[5] = "proQty";
                            //Creating array for data
                            String[] data = new String[6];
                            data[0] = userId;
                            data[1] = proId;
                            data[2] = image;
                            data[3] = name;
                            data[4] = price;
                            data[5] = qtyInput.getText().toString();
                            PutData putData = new PutData("http://192.168.43.208/android/addToCart.php", "POST", field, data);
                            if (putData.startPut()) {
                                if (putData.onComplete()) {
//                                    progressBar.setVisibility(View.GONE);
                                    String result = putData.getResult();
                                     qtyInput.setText("");
                                    Toast.makeText(getApplicationContext(), result, Toast.LENGTH_SHORT).show();


                                }
                            }
                            //End Write and Read data with URL
                        }
                    });
                } else {
                    Toast.makeText(getApplicationContext(), "please prove qty", Toast.LENGTH_LONG).show();
                }
            }
        });


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
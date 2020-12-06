package com.example.agrmangement;

import androidx.appcompat.app.ActionBar;
import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.os.Handler;
import android.os.Looper;
import android.view.View;
import android.widget.AdapterView;
import android.widget.LinearLayout;
import android.widget.ListView;
import android.widget.Toast;

import com.vishnusivadas.advanced_httpurlconnection.FetchData;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.List;

public class product extends AppCompatActivity {
    LinearLayout linearLayout;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_product);
        ActionBar actionBar = getSupportActionBar();
        //actionBar.setHomeButtonEnabled(true);
        actionBar.setDisplayHomeAsUpEnabled(true);
        actionBar.setTitle("Product Category");
       // getSupportActionBar().setDisplayHomeAsUpEnabled(true);
        linearLayout = (LinearLayout) findViewById(R.id.cat1);
        linearLayout.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(product.this, SingleCategory.class);
                startActivity(intent);
            }
        });
        final List<catSetData> catSetData;
        catSetData = new ArrayList<>();
        final ListView listView = (ListView) findViewById(R.id.MyList);


        Handler handler = new Handler(Looper.getMainLooper());
        handler.post(new Runnable() {
            @Override
            public void run() {
                FetchData fetchData = new FetchData("http://192.168.43.120/android/products.php");
                if (fetchData.startFetch()) {
                    if (fetchData.onComplete()) {
//

                        try {
                            JSONArray array = new JSONArray(fetchData.getResult());

                            for (int i = 0; i < array.length(); i++) {
                                int a = array.length();
                                JSONObject object = array.getJSONObject(i);
                                String id = object.getString("id");
                                String name = object.getString("name");
                                String qty = object.getString("qty");
                                String price = object.getString("price");
                                String description = object.getString("description");
                                String image = object.getString("image");
                                Toast.makeText(getApplicationContext(),price,Toast.LENGTH_SHORT).show();
                                catSetData.add(new catSetData(name, description, image,id,qty,price));
//                                String email = object.getString("email");
//                                String username = object.getString("username");

                            }
                            catAdpter catAdpter = new catAdpter(getApplicationContext(), R.layout.recentpro, catSetData);
                            listView.setAdapter(catAdpter);

                        } catch (JSONException e) {
                            e.printStackTrace();
                            Toast.makeText(getApplicationContext(), e.getMessage(), Toast.LENGTH_LONG).show();
                        }
                    } else {
                        Toast.makeText(getApplicationContext(), "error", Toast.LENGTH_LONG).show();
                    }
                }
            }
        });

        listView.setOnItemClickListener(new AdapterView.OnItemClickListener() {
            @Override
            public void onItemClick(AdapterView<?> adapterView, View view, int i, long l) {
                String name,image,description,qty,price;
                name=catSetData.get(i).getCatName();
                image=catSetData.get(i).getImage();
                qty=catSetData.get(i).getQty();
                price=catSetData.get(i).getPrice();
                description=catSetData.get(i).description;
                Intent intent=new Intent(getApplicationContext(),singleProduct.class);
                intent.putExtra("name",name);
                intent.putExtra("image",image);
                intent.putExtra("description",description);
                intent.putExtra("qty",qty);
                intent.putExtra("price",price);
                intent.putExtra("description",description);
                startActivity(intent);
                finish();
            }
        });

    }
}

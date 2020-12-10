package com.example.agrmangement;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.os.Handler;
import android.os.Looper;
import android.view.View;
import android.widget.AdapterView;
import android.widget.Button;
import android.widget.GridView;
import android.widget.ImageView;
import android.widget.ListView;
import android.widget.TextView;
import android.widget.Toast;

import com.squareup.picasso.Picasso;
import com.vishnusivadas.advanced_httpurlconnection.PutData;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.List;

public class SingleCategory extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_single_category);
        final List<catSetData> catSetData;
        catSetData = new ArrayList<>();

        final GridView listView = (GridView) findViewById(R.id.MyList);
//


//        Get data form product activity
        final String userId = getIntent().getStringExtra("userId");
        final String category = getIntent().getStringExtra("category");
        final String status= getIntent().getStringExtra("status");



//        Similar Products
        Handler handler = new Handler(Looper.getMainLooper());
        handler.post(new Runnable() {
            @Override
            public void run() {
                String[] field = new String[2];
                field[0] = "status";
                field[1] = "category";

                //Creating array for data
                String[] data = new String[2];
                data[0] = status;
                data[1]=category;
                PutData putData = new PutData("http://192.168.43.208/android/singleCategory.php", "POST", field, data);
                if (putData.startPut()) {
                    if (putData.onComplete()) {
//                        //progressBar.setVisibility(View.GONE);
                        try {
                            JSONArray array = new JSONArray(putData.getResult());

                            for (int i = 0; i < array.length(); i++) {
                                int a = array.length();
                                JSONObject object = array.getJSONObject(i);
                                String id = object.getString("id");
                                String name = object.getString("name");
                                String qty = object.getString("qty");
                                String price = object.getString("price");
                                String description = object.getString("description");
                                String image = object.getString("image");
                                String category=object.getString("category");
                                Toast.makeText(getApplicationContext(), price, Toast.LENGTH_SHORT).show();
                                catSetData.add(new catSetData(name, description, image, id, qty, price,category));
//                                String email = object.getString("email");
//                                String username = object.getString("username");

                            }
                            catAdpter catAdpter = new catAdpter(getApplicationContext(), R.layout.gridviewitem, catSetData);
                            listView.setAdapter(catAdpter);

                        } catch (JSONException e) {
                            e.printStackTrace();
                            Toast.makeText(getApplicationContext(), e.getMessage(), Toast.LENGTH_LONG).show();
                        }
                    } else {
                        Toast.makeText(getApplicationContext(), "error", Toast.LENGTH_LONG).show();
                    }
                } else {
                    Toast.makeText(getApplicationContext(), "No Internet connection", Toast.LENGTH_LONG).show();
                }
            }
        });

        listView.setOnItemClickListener(new AdapterView.OnItemClickListener() {
            @Override
            public void onItemClick(AdapterView<?> adapterView, View view, int i, long l) {
                String id, name, image, description, qty, price,category;
                id = catSetData.get(i).getId();
                name = catSetData.get(i).getCatName();
                image = catSetData.get(i).getImage();
                qty = catSetData.get(i).getQty();
                price = catSetData.get(i).getPrice();
                description = catSetData.get(i).description;
                category=catSetData.get(i).getCategory();

                Intent intent = new Intent(getApplicationContext(), singleProduct.class);
                intent.putExtra("userId", userId);
                intent.putExtra("status",status);
                intent.putExtra("proId", id);
                intent.putExtra("name", name);
                intent.putExtra("image", image);
                intent.putExtra("description", description);
                intent.putExtra("qty", qty);
                intent.putExtra("price", price);
                intent.putExtra("description", description);
                intent.putExtra("category",category);
                startActivity(intent);

            }
        });
    }
}
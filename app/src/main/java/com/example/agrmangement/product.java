package com.example.agrmangement;

import androidx.annotation.NonNull;
import androidx.appcompat.app.ActionBar;
import androidx.appcompat.app.AppCompatActivity;
import androidx.appcompat.widget.Toolbar;

import android.content.Intent;
import android.os.Bundle;
import android.os.Handler;
import android.os.Looper;
import android.view.Menu;
import android.view.MenuInflater;
import android.view.MenuItem;
import android.view.View;
import android.widget.AdapterView;
import android.widget.GridView;
import android.widget.LinearLayout;
import android.widget.ListView;
import android.widget.ProgressBar;
import android.widget.Toast;

import com.vishnusivadas.advanced_httpurlconnection.FetchData;
import com.vishnusivadas.advanced_httpurlconnection.PutData;

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
        Toolbar toolbar = (Toolbar) findViewById(R.id.toolbar);
        toolbar.setTitle("Products");
        setSupportActionBar(toolbar);
        //get User Id and status

        final String userId = getIntent().getStringExtra("userId");
        final String status = getIntent().getStringExtra("status");

        toolbar.setNavigationIcon(R.drawable.ic_back);
        toolbar.setNavigationOnClickListener(new View.OnClickListener() {

            @Override
            public void onClick(View v) {
                Intent intent = new Intent(getApplicationContext(), home.class);
                intent.putExtra("userId", userId);
                startActivity(intent);
            }
        });


        linearLayout = (LinearLayout) findViewById(R.id.cat1);
        LinearLayout cat2 = (LinearLayout) findViewById(R.id.cat2);
        LinearLayout cat3 = (LinearLayout) findViewById(R.id.cat3);
        LinearLayout cat4 = (LinearLayout) findViewById(R.id.cat4);
        final ProgressBar progressBar = (ProgressBar) findViewById(R.id.vProgressBar);

        linearLayout.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(product.this, SingleCategory.class);
                intent.putExtra("userId", userId);
                intent.putExtra("category", "IMBOGA");
                intent.putExtra("status", status);
                startActivity(intent);
            }
        });

        cat2.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(product.this, SingleCategory.class);
                intent.putExtra("userId", userId);
                intent.putExtra("category", "IBIRIBWA");
                intent.putExtra("status", status);
                startActivity(intent);
            }
        });

        cat3.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(product.this, SingleCategory.class);
                intent.putExtra("userId", userId);
                intent.putExtra("category", "IMBUTO");
                intent.putExtra("status", status);
                startActivity(intent);
            }
        });

        cat4.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(product.this, SingleCategory.class);
                intent.putExtra("userId", userId);
                intent.putExtra("category", "AMATUNGO");
                intent.putExtra("status", status);
                startActivity(intent);
            }
        });
        final List<catSetData> catSetData;
        catSetData = new ArrayList<>();
        final GridView listView = (GridView) findViewById(R.id.MyList);

        progressBar.setVisibility(View.VISIBLE);
        Handler handler = new Handler(Looper.getMainLooper());
        handler.post(new Runnable() {
            @Override
            public void run() {
                String[] field = new String[1];
                field[0] = "status";

                //Creating array for data
                String[] data = new String[1];
                data[0] = status;
                PutData putData = new PutData("http://192.168.43.208/android/recent_products.php", "POST", field, data);
                if (putData.startPut()) {
                    if (putData.onComplete()) {
                        progressBar.setVisibility(View.GONE);
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
                                String category = object.getString("category");
                                catSetData.add(new catSetData(name, description, image, id, qty, price, category));
//

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
                String id, name, image, description, qty, price, category;
                id = catSetData.get(i).getId();
                name = catSetData.get(i).getCatName();
                image = catSetData.get(i).getImage();
                qty = catSetData.get(i).getQty();
                price = catSetData.get(i).getPrice();
                description = catSetData.get(i).getDescription();
                category = catSetData.get(i).getCategory();

                Intent intent = new Intent(product.this, singleProduct.class);

                intent.putExtra("userId", userId);
                intent.putExtra("status", status);
                intent.putExtra("category", category);
                intent.putExtra("proId", id);
                intent.putExtra("name", name);
                intent.putExtra("image", image);
                intent.putExtra("description", description);
                intent.putExtra("qty", qty);
                intent.putExtra("price", price);
                intent.putExtra("description", description);
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
        switch (item.getItemId()) {
            case R.id.shop_cart:
                Intent intent = new Intent(product.this, cart.class);
                final String userId = getIntent().getStringExtra("userId");
                intent.putExtra("userId", userId);
                startActivity(intent);
                break;
        }
        return super.onOptionsItemSelected(item);
    }
}

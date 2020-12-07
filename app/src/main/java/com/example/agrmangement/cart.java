package com.example.agrmangement;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.os.Handler;
import android.os.Looper;
import android.view.View;
import android.widget.ListView;
import android.widget.Toast;

import com.vishnusivadas.advanced_httpurlconnection.PutData;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.List;

public class cart extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_cart);

        //get user ID
        final String userId = getIntent().getStringExtra("userId");

        final List<setCartData> setCartData;
        setCartData = new ArrayList<>();
        final ListView listView = (ListView) findViewById(R.id.cartList);


        Handler handler = new Handler(Looper.getMainLooper());
        handler.post(new Runnable() {
            @Override
            public void run() {
                //Starting Write and Read data with URL
                //Creating array for parameters
                String[] field = new String[1];
                field[0] = "userId";

                //Creating array for data
                String[] data = new String[1];
                data[0] = userId;
                PutData putData = new PutData("http://192.168.43.208/android/myCart.php", "POST", field, data);
                if (putData.startPut()) {
                    String result = null;
                    if (putData.onComplete()) {
                        // progressBar.setVisibility(View.GONE);
                        result = putData.getResult();
                        if (!result.toString().equals("Your Cart is empty")) {
                            try {
                                JSONArray array = new JSONArray(result);

                                for (int i = 0; i < array.length(); i++) {
                                    int a = array.length();
                                    JSONObject object = array.getJSONObject(i);
                                    String id = object.getString("id");
                                    String proId = object.getString("proId");
                                    String proImage = object.getString("proImage");
                                    String proPrice = object.getString("proPrice");
                                    String proQty = object.getString("proQty");
                                    String proName = object.getString("proName");

                                    setCartData.add(new setCartData(id, proImage, proName, "u", "qty", proPrice, proQty));

                                }
                                cartAdpter cartAdpter = new cartAdpter(getApplicationContext(), R.layout.cart_item, setCartData);
                                listView.setAdapter(cartAdpter);

                            } catch (JSONException e) {
                                e.printStackTrace();
                                Toast.makeText(getApplicationContext(), e.getMessage(), Toast.LENGTH_LONG).show();
                            }
                        } else {
                            Toast.makeText(getApplicationContext(), result, Toast.LENGTH_SHORT).show();
                        }
                    } else {
                        Toast.makeText(getApplicationContext(), result, Toast.LENGTH_SHORT).show();

                    }

                }
            }
            //End Write and Read data with URL

        });


    }
}
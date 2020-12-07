package com.example.agrmangement;

import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ArrayAdapter;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

import androidx.annotation.NonNull;
import androidx.annotation.Nullable;

import com.squareup.picasso.Picasso;

import java.util.List;

public class cartAdpter extends ArrayAdapter<setCartData> {
    Context context;
    int resource;
    List<setCartData> setCartData;

    public cartAdpter(Context context, int resource, List<setCartData> setCartData) {
        super(context, resource, setCartData);
        this.setCartData = setCartData;
        this.context = context;
        this.resource = resource;
    }

    @NonNull
    @Override
    public View getView(int position, @Nullable View convertView, @NonNull ViewGroup parent) {
        LayoutInflater layoutInflater = LayoutInflater.from(context);
        View view = layoutInflater.inflate(resource, null, false);
        TextView name=view.findViewById(R.id.cartName);
        TextView close=view.findViewById(R.id.close);
        ImageView img=view.findViewById(R.id.cartImage);
        TextView price=view.findViewById(R.id.cartPrice);
        TextView cartQty=view.findViewById(R.id.cartQty);
        final setCartData setCartDataNew= setCartData.get(position);
        name.setText(setCartDataNew.getName());
        price.setText(setCartDataNew.getPrice()+"Frw");
        cartQty.setText(setCartDataNew.getQty());
        Picasso.get().load(setCartDataNew.getImage()).into(img);

        close.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Toast.makeText(getContext(),"It worked",Toast.LENGTH_SHORT).show();
            }
        });
        return  view;
    }
}

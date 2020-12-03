package com.example.agrmangement;

import android.content.Context;
import android.content.Intent;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ArrayAdapter;
import android.widget.LinearLayout;
import android.widget.TextView;
import android.widget.Toast;

import androidx.annotation.NonNull;
import androidx.annotation.Nullable;

import java.util.List;

public class catAdpter extends ArrayAdapter<catSetData> {

    Context context;
    int resource;
    List<catSetData> catSetData;

    public catAdpter(Context context, int resource, List<catSetData> catSetData) {
        super(context, resource, catSetData);
        this.catSetData = catSetData;
        this.context = context;
        this.resource = resource;
    }

    @NonNull
    @Override
    public View getView(int position, @Nullable View convertView, @NonNull ViewGroup parent) {
        LayoutInflater layoutInflater = LayoutInflater.from(context);
        View view = layoutInflater.inflate(resource, null, false);

        TextView catName = view.findViewById(R.id.catName);
        LinearLayout Link = view.findViewById(R.id.link);
        final com.example.agrmangement.catSetData catSetDataNew = catSetData.get(position);
        catName.setText(catSetDataNew.getCatName());
        Link.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intent = new Intent(context, singleProduct.class);
                context.startActivity(intent);
                Toast.makeText(context, catSetDataNew.getCatName(), Toast.LENGTH_LONG).show();

            }
        });


        return view;
    }
}

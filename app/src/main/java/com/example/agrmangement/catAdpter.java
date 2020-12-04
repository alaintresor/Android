package com.example.agrmangement;

import android.content.Context;
import android.content.Intent;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ArrayAdapter;
import android.widget.ImageView;
import android.widget.LinearLayout;
import android.widget.TextView;
import android.widget.Toast;

import androidx.annotation.NonNull;
import androidx.annotation.Nullable;

import com.squareup.picasso.Picasso;

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
        TextView description = view.findViewById(R.id.dc);
        ImageView image=view.findViewById(R.id.catImage);
        LinearLayout Link = view.findViewById(R.id.link);
        final com.example.agrmangement.catSetData catSetDataNew = catSetData.get(position);
        catName.setText(catSetDataNew.getCatName());
        description.setText(catSetDataNew.getDescription());
        Picasso.get().load(catSetDataNew.getImage()).into(image);

        image.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
//                <<<<<<<<<<<<<<<<<<<<<<<<<<<hano uhakosore mn>>>>>>>>>>>>>>>>>>>>>
                Intent intent=new Intent(getContext(),singleProduct.class);
                context.startActivity(intent);
//                finish();



            }
        });


        return view;
    }
}

package com.example.agrmangement;

import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ArrayAdapter;
import android.widget.TextView;

import androidx.annotation.NonNull;
import androidx.annotation.Nullable;

import java.util.List;

public class SimilarAdpter extends ArrayAdapter<setSimilarData> {
    Context context;
    int resource;
    List<setSimilarData> setSimilarData;
    public SimilarAdpter(Context context, int resource, List<setSimilarData> setSimilarData){
        super(context,resource,setSimilarData);
        this.context=context;
        this.resource=resource;
        this.setSimilarData=setSimilarData;
    }

    @NonNull
    @Override
    public View getView(int position, @Nullable View convertView, @NonNull ViewGroup parent) {
        LayoutInflater layoutInflater = LayoutInflater.from(context);
        View view = layoutInflater.inflate(resource, null, false);
        TextView name=view.findViewById(R.id.proName);
        final com.example.agrmangement.setSimilarData setSimilarDataNew =setSimilarData.get(position);
        name.setText(setSimilarDataNew.getName());

        return view;
    }
}

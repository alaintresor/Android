package com.example.agrmangement;

import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ArrayAdapter;

import androidx.annotation.NonNull;
import androidx.annotation.Nullable;

import java.util.List;

public class HomeAdpter extends ArrayAdapter<setData> {
    Context context;
    int resource;
    List<setData> setData;

    public HomeAdpter(Context context, int resource, List<setData> setData) {
        super(context, resource, setData);
        this.context = context;
        this.resource = resource;
        this.setData = setData;
    }


    @NonNull
    @Override
    public View getView(int position, @Nullable View convertView, @NonNull ViewGroup parent) {
        LayoutInflater layoutInflater = LayoutInflater.from(context);
        View view = layoutInflater.inflate(resource, null, false);


        return view;
    }


}

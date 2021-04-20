package com.tourguide.example.silpakorn;

import android.content.pm.ActivityInfo;
import android.graphics.drawable.Drawable;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.text.method.ScrollingMovementMethod;
import android.util.Log;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.ViewFlipper;

import java.util.ArrayList;

public class DetailActivity extends AppCompatActivity {
    private TextView descriptionText;
    private ImageView imageView;
    private SetLocation locationList;
    private TextView namePosition;
    private ViewFlipper v_flipper;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_detail);
        //*request screen portrait*//
        setRequestedOrientation(ActivityInfo.SCREEN_ORIENTATION_PORTRAIT);

        //imageView = (ImageView) findViewById(R.id.imageDetail);
        descriptionText = (TextView) findViewById(R.id.descriptionText);
        namePosition = (TextView) findViewById(R.id.namePosition);
        v_flipper = (ViewFlipper) findViewById(R.id.v_flipper);
        int positionID = getIntent().getExtras().getInt("mpID");

        locationList = new SetLocation();
        AugmentedPOI mPoi = locationList.searchPosition(positionID);
        int mID = mPoi.getPoiId();


        namePosition.setText(mPoi.getPoiName());
        //set image view

        String mid = "poi"+mID; // main image
        int resMainImageID = this.getResources().getIdentifier(mid,"drawable", getPackageName());
       // imageView.setImageResource(resID);

        int resMoreImageID1 = this.getResources().getIdentifier("poi"+mID+"_"+"1","drawable", getPackageName());
        int resMoreImageID2 = this.getResources().getIdentifier("poi"+mID+"_"+"2","drawable", getPackageName());
        int resMoreImageID3 = this.getResources().getIdentifier("poi"+mID+"_"+"3","drawable", getPackageName());

        if(resMoreImageID1==0&&resMoreImageID2==0&&resMoreImageID3==0) {
            int images[] = {resMainImageID};
            setFlipperImage(images);
        }
        else if(resMoreImageID2==0&&resMoreImageID3==0) {
            int images[] = {resMainImageID,resMoreImageID1};
            setFlipperImage(images);
        }
        else if(resMoreImageID3==0){
            int images[] = {resMainImageID,resMoreImageID1,resMoreImageID2};
            setFlipperImage(images);
        }
        else{
            int images[] = {resMainImageID,resMoreImageID1,resMoreImageID2,resMoreImageID3};
            setFlipperImage(images);
        }

        //set description text
        descriptionText.setText(mPoi.getPoiDescription());
        descriptionText.setMovementMethod(new ScrollingMovementMethod());


    }
    public void setFlipperImage(int images[]){
        //but I perfer foreach image show
        if(images.length>1)
        for (int image : images) {
            flipperImages(image);
        }
        else{
            flipperImageSingle(images[0]);
        }
    }
    public  void  flipperImages(int image){
        ImageView imageView = new ImageView(this);
        imageView.setBackgroundResource(image);

        v_flipper.addView(imageView);
        v_flipper.setFlipInterval(4000); //4 sec
        v_flipper.setAutoStart(true);
        //animation
        v_flipper.setInAnimation(this,android.R.anim.slide_in_left);
        v_flipper.setOutAnimation(this,android.R.anim.slide_out_right);
    }
    public void flipperImageSingle(int image){
        ImageView imageView = new ImageView(this);
        imageView.setBackgroundResource(image);

        v_flipper.addView(imageView);
    }
}

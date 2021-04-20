package com.tourguide.example.silpakorn;
/**
 * Created by MarciaFesta Moss on 10/27/2017.
 */
import android.Manifest;
import android.content.Intent;
import android.content.pm.ActivityInfo;
import android.content.pm.PackageManager;
import android.os.CountDownTimer;
import android.support.v4.app.ActivityCompat;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;

public class SplashActivity extends AppCompatActivity {
    private static final int REQUEST_CAMERA_PERMISSION = 200;
    private Button btnStart;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_splash);
        //*request screen portrait*//
        setRequestedOrientation(ActivityInfo.SCREEN_ORIENTATION_PORTRAIT);

       btnStart = (Button)findViewById(R.id.buttonStart);
        btnStart.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(getBaseContext(), CameraViewActivity.class);
                startActivity(intent);
                finish();
            }
        });

        if(ActivityCompat.checkSelfPermission(SplashActivity.this, Manifest.permission.CAMERA) != PackageManager.PERMISSION_GRANTED)
        {
            ActivityCompat.requestPermissions(SplashActivity.this,new String[]{
                    Manifest.permission.CAMERA,
                    Manifest.permission.WRITE_EXTERNAL_STORAGE,
                    Manifest.permission.ACCESS_FINE_LOCATION,
                    Manifest.permission.ACCESS_NETWORK_STATE,
                    Manifest.permission.INTERNET,

            },REQUEST_CAMERA_PERMISSION);
            return;
        }

        /*new CountDownTimer(2500,500) {

            // This method will be invoked on finishing or expiring the timer
            @Override
            public void onFinish() {
                // Creates an intent to start new activity
                Intent intent = new Intent(getBaseContext(), CameraViewActivity.class);
                if(ActivityCompat.checkSelfPermission(SplashActivity.this, Manifest.permission.CAMERA) != PackageManager.PERMISSION_GRANTED)
                {
                    ActivityCompat.requestPermissions(SplashActivity.this,new String[]{
                            Manifest.permission.CAMERA,
                            Manifest.permission.WRITE_EXTERNAL_STORAGE,
                            Manifest.permission.ACCESS_FINE_LOCATION,
                            Manifest.permission.ACCESS_NETWORK_STATE,
                            Manifest.permission.INTERNET,

                    },REQUEST_CAMERA_PERMISSION);
                  //  return;
                }
                else {
                    startActivity(intent);
                }

                finish();
            }

            @Override
            public void onTick(long millisUntilFinished) {

            }
        }.start();
*/
    }

}

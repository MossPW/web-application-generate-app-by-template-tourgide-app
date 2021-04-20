package com.tourguide.example.silpakorn;
import android.content.ContentValues;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.util.Log;
import android.widget.ListView;
import android.widget.SimpleCursorAdapter;
import android.widget.TextView;

import com.tourguide.example.silpakorn.DB.MyHelper;
public class TotalScore extends AppCompatActivity {
        private static  final String TAG = "HighScoreActivity";
        private MyHelper mHelper;
        private SQLiteDatabase mDatabase;
        private ListView list;
        private SimpleCursorAdapter mAdapter;
        private TextView totalScoreText;
        @Override
        protected void onCreate(Bundle savedInstanceState) {
            super.onCreate(savedInstanceState);
            setContentView(R.layout.activity_score);

            totalScoreText = (TextView)findViewById(R.id.textTotalScore);
            mHelper = new MyHelper(this);
            mDatabase = mHelper.getWritableDatabase();

            list = (ListView)findViewById(android.R.id.list);

            mAdapter = new SimpleCursorAdapter(this,
                    R.layout.listlayout,
                    null,
                    new String[] {MyHelper.COL_POSITION,MyHelper.COL_SCORE},
                    new int[] {R.id.positionname,R.id.outputscore});
           if(!isEmptyScore()) {
                showScore();
                list.setAdapter(mAdapter);
            }
        }
        private void showScore() {
/*query(String table, String[] columns, String selection, String[] selectionArgs, String groupBy, String having, String orderBy, String limit)*/
            Cursor c = mDatabase.query(MyHelper.TABLE_NAME, //ชื่อตาราง
                    null,
                    null,
                    null,
                    null,
                    null,
                    MyHelper.COL_SCORE + " DESC", // เรียงคะแนนจากน้อยไปมาก
                    null);
            mAdapter.changeCursor(c);
//รวมคะแนน
            long score = 0;
            int count =0;
            while(c.moveToNext()) {
                count++;
                long itemId = c.getLong(
                        c.getColumnIndex(MyHelper.COL_SCORE));
                        score+=itemId;
            }
	if(score>0){ //แก้ปัญหา การหาร 0 จากคะแนนที่ได้ 0
                        score = score*100/(count*100);
	}
 /* แสดงผลรวมคะแนน */       totalScoreText.setText(String.valueOf(score));
        }
        public boolean isEmptyScore(){
            Cursor c = mDatabase.query(MyHelper.TABLE_NAME, //ชื่อตาราง
                    null,
                    null,
                    null,
                    null,
                    null,
                    MyHelper.COL_SCORE + " DESC", // เรียงคะแนนจากน้อยไปมาก
                    null);
            return c==null;
        }

}

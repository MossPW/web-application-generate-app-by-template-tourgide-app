package com.tourguide.example.silpakorn.DB;

import android.content.ContentValues;
import android.content.Context;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;

import static android.R.attr.version;

/**
 * Created by MarciaFesta Moss on 19/11/2017.
 */

public class MyHelper extends SQLiteOpenHelper{
    private static  final String DATABASE_NAME = "mathmagic.db";
    private static  final int DATABASE_VERSION = 1;


    public MyHelper(Context context) {

        super(context, DATABASE_NAME, null, DATABASE_VERSION);
    }
    public static final String TABLE_NAME = "scores";
    public static final String COL_ID = "_id";
    public static final String COL_SCORE = "score";
    public static final String COL_POSITION = "position";
    @Override
    public void onCreate(SQLiteDatabase db) {
        String sqlCreateTable = "CREATE TABLE %s (%s INTEGER PRIMARY KEY AUTOINCREMENT,"
                + "%s REAL,"
                + "%s INTEGER)";

        sqlCreateTable = String.format(sqlCreateTable, TABLE_NAME, COL_ID,COL_SCORE, COL_POSITION);

        db.execSQL(sqlCreateTable);
    }

    @Override
    public void onUpgrade(SQLiteDatabase db, int oldVersion, int newVersion) {
return;

    }
}


/**
 *
 *   public void saveScore(){
 /////////////////////////////send score to table
 ContentValues cv = new ContentValues();
 cv.put(MyHelper.COL_SCORE, totalPoint);//count
 setLevel();
 cv.put(MyHelper.COL_DIFFICULTY, Operatorlevel);
 mDatabase.insert(MyHelper.TABAL_NAME, null, cv);

 }

 */

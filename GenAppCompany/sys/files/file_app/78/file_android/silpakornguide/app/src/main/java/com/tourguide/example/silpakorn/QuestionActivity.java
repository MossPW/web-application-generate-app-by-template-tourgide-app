package com.tourguide.example.silpakorn;

import android.content.ContentValues;
import android.content.DialogInterface;
import android.content.Intent;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;
import android.graphics.Color;
import android.support.v7.app.AlertDialog;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.Spinner;
import android.widget.TextView;
import android.widget.Toast;

import com.tourguide.example.silpakorn.DB.MyHelper;

import java.lang.reflect.Array;
import java.util.ArrayList;
import java.util.HashSet;
import java.util.Map;
import java.util.Random;
import java.util.Set;

public class QuestionActivity extends AppCompatActivity {
    private SQLiteDatabase mDatabase;
    private MyHelper mHelper;
    private AugmentedPOI mPoi;
    private TextView topicQuestion;
    private TextView questionTextView;
    // button chooice type1//
    private Button choice1_type1;
    private Button choice2_type1;
    private Button choice3_type1;
    private Button choice4_type1;
    // button chooice type2
    private Button choice1_type2;
    private Button choice2_type2;
    // button chooice type3//
    private Button choice1_type3;
    private Button choice2_type3;
    private Button choice3_type3;
    private Button choice4_type3;
    // dropdown choice and select type4//
    private Spinner choice1Dropdown_type4;
    private Spinner choice2Dropdown_type4;
    private Spinner choice3Dropdown_type4;
    private Spinner choice4Dropdown_type4;
    private String dropdownSelect1_type4 = "";
    private String dropdownSelect2_type4 = "";
    private String dropdownSelect3_type4 = "";
    private String dropdownSelect4_type4 = "";
    //
    private Button btnEnter;
    /* System */
    private int typeQusetion=0;
    private String mQuestion;
    private String mChoiceArr[];
    private String mAnswerArr[];
    private int countCorrect = 0;
    private int totalScore = 0;
    /* User */
    private String userAnswer_Type1 = "";
    private String userAnswer_Type2 = "";
    private HashSet<String> userAnswer_Type3 = new HashSet<String>();
    private ArrayList<String> userAnswer_Type4 = new ArrayList<String>();
    //SetQuestion/
    private SetQuestion questionList ;
    private final Random rand = new Random();
    private int countRandom = 0;
    private ArrayList<Integer> listLastRandom = new ArrayList<Integer>();

    public QuestionActivity() {
    }

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_question);
        setIdButton();
        mHelper = new MyHelper(this);
        mDatabase = mHelper.getWritableDatabase();

        int positionID = getIntent().getExtras().getInt("mpID");
        SetLocation locationList = new SetLocation();
        mPoi = locationList.searchPosition(positionID);
        //code get questionList form Positon OBJect
        questionList = mPoi.getSetQuestion();
        createQuestion();
        countRandom++;
        btnEnter.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Log.d("countRandom", String.valueOf(countRandom));
               /* if(!(countRandom<=questionList.getSizeList())) { //check count question
                    Log.d("end", "end question");
                    gameOver();
                }*/
                    switch (typeQusetion) {
                        case 1:
                            if (userAnswer_Type1 != "") {
                                if (isCorrectAnswer(typeQusetion, mAnswerArr)) {
                                    Log.d("hey", "ถูก");
                                    Toast.makeText(QuestionActivity.this, "คุณตอบถูก!",
                                            Toast.LENGTH_LONG).show();
                                            countCorrect++;
                                } else {
                                    Log.d("hey", "ผิด");
                                    Toast.makeText(QuestionActivity.this, "คุณตอบผิด!",
                                            Toast.LENGTH_LONG).show();
                                }
                                resetAnswer();
                                if(countRandom<=questionList.getSizeList()) { //check count question
                                    createQuestion();
                                }
                                else{
                                    gameOver();
                                    Log.d("end", "end question");
                                }
                            } else {
                                Toast.makeText(QuestionActivity.this,
                                        "คุณยังไม่ได้เลือกคำตอบ!", Toast.LENGTH_LONG)
                                        .show();
                            }
                            break;
                        case 2:
                            if (userAnswer_Type2 != "") {
                                if (isCorrectAnswer(typeQusetion, mAnswerArr)) {
                                    Toast.makeText(QuestionActivity.this, "คุณตอบถูก!",
                                            Toast.LENGTH_LONG).show();
                                            countCorrect++;
                                } else {
                                    Toast.makeText(QuestionActivity.this, "คุณตอบผิด!",
                                            Toast.LENGTH_LONG).show();
                                }
                                resetAnswer();
                                if(countRandom<=questionList.getSizeList()) { //check count question
                                    createQuestion();
                                }
                                else{
                                    gameOver();
                                    Log.d("end", "end question");
                                }
                            } else {
                                Toast.makeText(QuestionActivity.this,
                                        "คุณยังไม่ได้เลือกคำตอบ!", Toast.LENGTH_LONG)
                                        .show();
                            }
                            break;
                        case 3:
                            if (!userAnswer_Type3.isEmpty()) {
                                if (isCorrectAnswer(typeQusetion, mAnswerArr)) {
                                    Toast.makeText(QuestionActivity.this, "คุณตอบถูก!",
                                            Toast.LENGTH_LONG).show();
                                            countCorrect++;
                                } else {
                                    Toast.makeText(QuestionActivity.this, "คุณตอบผิด!",
                                            Toast.LENGTH_LONG).show();
                                }
                                resetAnswer();
                                if(countRandom<=questionList.getSizeList()) { //check count question
                                    createQuestion();
                                }
                                else{
                                    gameOver();
                                    Log.d("end", "end question");
                                }
                            } else {
                                Toast.makeText(QuestionActivity.this,
                                        "คุณยังไม่ได้เลือกคำตอบ!", Toast.LENGTH_LONG)
                                        .show();
                            }
                            break;
                        case 4:
                            userAnswer_Type4.add(dropdownSelect1_type4);
                            userAnswer_Type4.add(dropdownSelect2_type4);
                            userAnswer_Type4.add(dropdownSelect3_type4);
                            userAnswer_Type4.add(dropdownSelect4_type4);

                            if (isCorrectAnswer(typeQusetion, mAnswerArr)) {
                                Toast.makeText(QuestionActivity.this, "คุณตอบถูก!",
                                        Toast.LENGTH_LONG).show();
                                        countCorrect++;

                            } else {
                                Toast.makeText(QuestionActivity.this, "คุณตอบผิด!",
                                        Toast.LENGTH_LONG).show();
                            }
                            resetAnswer();
                            if(countRandom<=questionList.getSizeList()) { //check count question
                                createQuestion();
                            }
                            else{
                                gameOver();
                                Log.d("end", "end question");
                            }
                            break;

                        default:
                            Log.d("end", "end question");
                            gameOver();
                            break;
                    }

                //Log.d("countCorrect", String.valueOf(countCorrect));


               /* else{
                    Log.d("end", "end question");
                    gameOver();
                }*/
                //Log.d("countCorrect", String.valueOf(countCorrect));

            }
        });
		/* onClick TYPE 1 */
        choice1_type1.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                setColorButtonClick(choice1_type1);
                setColorButtonDefult(choice2_type1);
                setColorButtonDefult(choice3_type1);
                setColorButtonDefult(choice4_type1);
                userAnswer_Type1 = choice1_type1.getText().toString();

            }
        });
        choice2_type1.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                setColorButtonClick(choice2_type1);
                setColorButtonDefult(choice1_type1);
                setColorButtonDefult(choice3_type1);
                setColorButtonDefult(choice4_type1);
                userAnswer_Type1 = choice2_type1.getText().toString();
            }
        });
        choice3_type1.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                setColorButtonClick(choice3_type1);
                setColorButtonDefult(choice1_type1);
                setColorButtonDefult(choice2_type1);
                setColorButtonDefult(choice4_type1);
                userAnswer_Type1 = choice3_type1.getText().toString();

            }
        });
        choice4_type1.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                setColorButtonClick(choice4_type1);
                setColorButtonDefult(choice1_type1);
                setColorButtonDefult(choice2_type1);
                setColorButtonDefult(choice3_type1);
                userAnswer_Type1 = choice4_type1.getText().toString();

            }
        });
		/* onClick TYPE 2 */
        choice1_type2.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                setColorButtonClick(choice1_type2);
                setColorButtonDefult(choice2_type2);
                userAnswer_Type2 = choice1_type2.getText().toString();
            }
        });
        choice2_type2.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                setColorButtonClick(choice2_type2);
                setColorButtonDefult(choice1_type2);
                userAnswer_Type2 = choice2_type2.getText().toString();
            }
        });
		/* onClick TYPE 3 */
        choice1_type3.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                if (userAnswer_Type3.contains(choice1_type3.getText()
                        .toString())) {
                    // คำตอบ ถูกเลือกอยู่แล้ว แสดงว่าจะยกเลิก
                    userAnswer_Type3.remove(choice1_type3.getText().toString());
                    setColorButtonDefult(choice1_type3);
                } else {
                    setColorButtonClick(choice1_type3);
                    userAnswer_Type3.add(choice1_type3.getText().toString());
                }

            }
        });
        choice2_type3.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                if (userAnswer_Type3.contains(choice2_type3.getText()
                        .toString())) {
                    // คำตอบ ถูกเลือกอยู่แล้ว แสดงว่าจะยกเลิก
                    userAnswer_Type3.remove(choice2_type3.getText().toString());
                    setColorButtonDefult(choice2_type3);
                } else {
                    setColorButtonClick(choice2_type3);
                    userAnswer_Type3.add(choice2_type3.getText().toString());
                }

            }
        });
        choice3_type3.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                if (userAnswer_Type3.contains(choice3_type3.getText()
                        .toString())) {
                    // คำตอบ ถูกเลือกอยู่แล้ว แสดงว่าจะยกเลิก
                    userAnswer_Type3.remove(choice3_type3.getText().toString());
                    setColorButtonDefult(choice3_type3);
                } else {
                    setColorButtonClick(choice3_type3);
                    userAnswer_Type3.add(choice3_type3.getText().toString());
                }
            }
        });
        choice4_type3.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                if (userAnswer_Type3.contains(choice4_type3.getText()
                        .toString())) {
                    // คำตอบ ถูกเลือกอยู่แล้ว แสดงว่าจะยกเลิก
                    userAnswer_Type3.remove(choice4_type3.getText().toString());
                    setColorButtonDefult(choice4_type3);
                } else {
                    setColorButtonClick(choice4_type3);
                    userAnswer_Type3.add(choice4_type3.getText().toString());
                }
            }
        });

        // * code onClick type 4
        choice1Dropdown_type4
                .setOnItemSelectedListener(new AdapterView.OnItemSelectedListener() {
                    @Override
                    public void onItemSelected(AdapterView<?> parent,
                                               View view, int position, long id) {
                        dropdownSelect1_type4 = mChoiceArr[position]; // add
                        // select
                    }

                    @Override
                    public void onNothingSelected(AdapterView<?> parent) {

                    }
                });
        choice2Dropdown_type4
                .setOnItemSelectedListener(new AdapterView.OnItemSelectedListener() {
                    @Override
                    public void onItemSelected(AdapterView<?> parent,
                                               View view, int position, long id) {
                        dropdownSelect2_type4 = mChoiceArr[position]; // add
                        // select
                    }

                    @Override
                    public void onNothingSelected(AdapterView<?> parent) {

                    }
                });
        choice3Dropdown_type4
                .setOnItemSelectedListener(new AdapterView.OnItemSelectedListener() {
                    @Override
                    public void onItemSelected(AdapterView<?> parent,
                                               View view, int position, long id) {
                        dropdownSelect3_type4 = mChoiceArr[position]; // add
                        // select
                    }

                    @Override
                    public void onNothingSelected(AdapterView<?> parent) {

                    }
                });
        choice4Dropdown_type4
                .setOnItemSelectedListener(new AdapterView.OnItemSelectedListener() {
                    @Override
                    public void onItemSelected(AdapterView<?> parent,
                                               View view, int position, long id) {
                        dropdownSelect4_type4 = mChoiceArr[position]; // add
                        // select
                    }

                    @Override
                    public void onNothingSelected(AdapterView<?> parent) {

                    }
                });
    }

    public void setIdButton() {
        questionTextView = (TextView) findViewById(R.id.question);
        topicQuestion = (TextView) findViewById(R.id.topicqustion);
        // button chooice type1//
        choice1_type1 = (Button) findViewById(R.id.choice1_type1);
        choice2_type1 = (Button) findViewById(R.id.choice2_type1);
        choice3_type1 = (Button) findViewById(R.id.choice3_type1);
        choice4_type1 = (Button) findViewById(R.id.choice4_type1);
        // button chooice type2//
        choice1_type2 = (Button) findViewById(R.id.choice1_type2);
        choice2_type2 = (Button) findViewById(R.id.choice2_type2);
        // button chooice type3//
        choice1_type3 = (Button) findViewById(R.id.choice1_type3);
        choice2_type3 = (Button) findViewById(R.id.choice2_type3);
        choice3_type3 = (Button) findViewById(R.id.choice3_type3);
        choice4_type3 = (Button) findViewById(R.id.choice4_type3);
        // dropdown choice type4//
        choice1Dropdown_type4 = (Spinner) findViewById(R.id.dropdown_choice1_type4);
        choice2Dropdown_type4 = (Spinner) findViewById(R.id.dropdown_choice2_type4);
        choice3Dropdown_type4 = (Spinner) findViewById(R.id.dropdown_choice3_type4);
        choice4Dropdown_type4 = (Spinner) findViewById(R.id.dropdown_choice4_type4);
        // btn Enter//
        btnEnter = (Button) findViewById(R.id.btnEnter);
    }

    public void setVisbleButton(int typeNumber) {
        switch (typeNumber) {
            case 1:
                // code
                choice1_type1.setVisibility(View.VISIBLE);
                choice2_type1.setVisibility(View.VISIBLE);
                choice3_type1.setVisibility(View.VISIBLE);
                choice4_type1.setVisibility(View.VISIBLE);
                //
                choice1_type2.setVisibility(View.INVISIBLE);
                choice2_type2.setVisibility(View.INVISIBLE);
                //
                choice1_type3.setVisibility(View.INVISIBLE);
                choice2_type3.setVisibility(View.INVISIBLE);
                choice3_type3.setVisibility(View.INVISIBLE);
                choice4_type3.setVisibility(View.INVISIBLE);
                //
                choice1Dropdown_type4.setVisibility(View.INVISIBLE);
                choice2Dropdown_type4.setVisibility(View.INVISIBLE);
                choice3Dropdown_type4.setVisibility(View.INVISIBLE);
                choice4Dropdown_type4.setVisibility(View.INVISIBLE);
                break;
            case 2:
                // code
                choice1_type1.setVisibility(View.INVISIBLE);
                choice2_type1.setVisibility(View.INVISIBLE);
                choice3_type1.setVisibility(View.INVISIBLE);
                choice4_type1.setVisibility(View.INVISIBLE);
                //
                choice1_type2.setVisibility(View.VISIBLE);
                choice2_type2.setVisibility(View.VISIBLE);
                //
                choice1_type3.setVisibility(View.INVISIBLE);
                choice2_type3.setVisibility(View.INVISIBLE);
                choice3_type3.setVisibility(View.INVISIBLE);
                choice4_type3.setVisibility(View.INVISIBLE);
                //
                choice1Dropdown_type4.setVisibility(View.INVISIBLE);
                choice2Dropdown_type4.setVisibility(View.INVISIBLE);
                choice3Dropdown_type4.setVisibility(View.INVISIBLE);
                choice4Dropdown_type4.setVisibility(View.INVISIBLE);
                break;
            case 3:
                // code
                choice1_type1.setVisibility(View.INVISIBLE);
                choice2_type1.setVisibility(View.INVISIBLE);
                choice3_type1.setVisibility(View.INVISIBLE);
                choice4_type1.setVisibility(View.INVISIBLE);
                //
                choice1_type2.setVisibility(View.INVISIBLE);
                choice2_type2.setVisibility(View.INVISIBLE);
                //
                choice1_type3.setVisibility(View.VISIBLE);
                choice2_type3.setVisibility(View.VISIBLE);
                choice3_type3.setVisibility(View.VISIBLE);
                choice4_type3.setVisibility(View.VISIBLE);
                //
                choice1Dropdown_type4.setVisibility(View.INVISIBLE);
                choice2Dropdown_type4.setVisibility(View.INVISIBLE);
                choice3Dropdown_type4.setVisibility(View.INVISIBLE);
                choice4Dropdown_type4.setVisibility(View.INVISIBLE);
                break;
            case 4:
                // code
                choice1_type1.setVisibility(View.INVISIBLE);
                choice2_type1.setVisibility(View.INVISIBLE);
                choice3_type1.setVisibility(View.INVISIBLE);
                choice4_type1.setVisibility(View.INVISIBLE);
                //
                choice1_type2.setVisibility(View.INVISIBLE);
                choice2_type2.setVisibility(View.INVISIBLE);
                //
                choice1_type3.setVisibility(View.INVISIBLE);
                choice2_type3.setVisibility(View.INVISIBLE);
                choice3_type3.setVisibility(View.INVISIBLE);
                choice4_type3.setVisibility(View.INVISIBLE);
                //
                choice1Dropdown_type4.setVisibility(View.VISIBLE);
                choice2Dropdown_type4.setVisibility(View.VISIBLE);
                choice3Dropdown_type4.setVisibility(View.VISIBLE);
                choice4Dropdown_type4.setVisibility(View.VISIBLE);
                break;
            default:
                break;

        }

    }

    public void setTopicQuestion(int typeQuestion){
        switch (typeQuestion){
            case 1 :
                topicQuestion.setText("เลือกตอบข้อใดข้อหนึ่ง");
                break;
            case 2 :
                topicQuestion.setText("เลือกตอบข้อใดข้อหนึ่ง");
                break;
            case 3 :
                topicQuestion.setText("เลือกตอบได้มากกว่า 1 ข้อ");
                break;
            case 4 :
                topicQuestion.setText("เรียงลำดับเหตุการณ์");
                break;

        }
    }

    public void setColorButtonClick(Button btn) {
        btn.setBackgroundColor(Color.parseColor("#f5891e"));
    }

    public void setColorButtonDefult(Button btn) {
        btn.setBackgroundColor(Color.parseColor("#3faef2"));
    }

    public int randomIndexQuestion() {
        int n;
        while (true) {
            n = rand.nextInt(questionList.getSizeList());
            if (!(listLastRandom.contains(n))) {
                break;
            }
        }
        listLastRandom.add(n);
        return n;
    }

    public void updateQuestion(int typeQuestion, String question,
                               String[] choice) {
        countRandom++;
        questionTextView.setText(question);
        switch (typeQuestion) {
            case 1: // 4 choice 1 answer
                choice1_type1.setText(choice[0]);
                choice2_type1.setText(choice[1]);
                choice3_type1.setText(choice[2]);
                choice4_type1.setText(choice[3]);
                break;
            case 2: // 2 choice 1 answer
                choice1_type2.setText(choice[0]);
                choice2_type2.setText(choice[1]);
                break;
            case 3:// 4 choice atleast 1 answer
                choice1_type3.setText(choice[0]);
                choice2_type3.setText(choice[1]);
                choice3_type3.setText(choice[2]);
                choice4_type3.setText(choice[3]);
                break;
            case 4:// 4 dropdown 1 anser //
                ArrayAdapter<String> adapter = new ArrayAdapter<String>(this,
                        android.R.layout.simple_spinner_item, choice);
                adapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
                choice1Dropdown_type4.setAdapter(adapter);
                choice2Dropdown_type4.setAdapter(adapter);
                choice3Dropdown_type4.setAdapter(adapter);
                choice4Dropdown_type4.setAdapter(adapter);
                break;
        }

    }

    public void createQuestion(){
        int randomIndex = randomIndexQuestion();
        Log.d("randomIndex", String.valueOf(randomIndex));
        QuestionLibrary q = questionList.getQuestionList(randomIndex);
        setVisbleButton(q.getTypeQuestion());
        updateQuestion(q.getTypeQuestion(), q.getQusetionArr(), q.getChoiceArr());
        typeQusetion = q.getTypeQuestion();
        setTopicQuestion(typeQusetion);
        mChoiceArr = q.getChoiceArr();
        mAnswerArr = q.getAnswerArr();
    }

    public boolean isCorrectAnswer(int typeQusetion, String[] mAnswerArr) {
        switch (typeQusetion) {
            case 1:
                // code check answer type 1
                if (mAnswerArr[0].equals(userAnswer_Type1)) {
                    return true;
                } else {
                    return false;
                }
            case 2:
                // code check answer type 2
                if (mAnswerArr[0].equals(userAnswer_Type2)) {
                    return true;
                } else {
                    return false;
                }
            case 3:
                // code check answer type 3
                int sizeSys = mAnswerArr.length;
                int sizeUse = userAnswer_Type3.size();
                if (sizeSys == sizeUse) {
                    // Log.d("hey", "equal size");
                    for (String answerSys : mAnswerArr) {
                        if (!(userAnswer_Type3.contains(answerSys))) {
                            return false;
                        }
                    }
                } else {
                    return false;
                }
                return true;

            case 4:
                // code check answer type 4
                for (int i = 0; i < mAnswerArr.length; i++) {
                    if (!(mAnswerArr[i].equals(userAnswer_Type4.get(i)))) {
                        return false;
                    }
                }
                return true;
        }
        return false;
    }

    public void resetAnswer() {
        userAnswer_Type1 = "";
        userAnswer_Type2 = "";
        typeQusetion=0;
        userAnswer_Type3.clear();
        userAnswer_Type4.clear();
        setColorButtonDefult(choice1_type1);
        setColorButtonDefult(choice2_type1);
        setColorButtonDefult(choice3_type1);
        setColorButtonDefult(choice4_type1);
        //
        setColorButtonDefult(choice1_type2);
        setColorButtonDefult(choice2_type2);
        //
        setColorButtonDefult(choice1_type3);
        setColorButtonDefult(choice2_type3);
        setColorButtonDefult(choice3_type3);
        setColorButtonDefult(choice4_type3);

    }

    public int calScore(){
        return countCorrect*100/questionList.getSizeList();
    }

    public void saveScore(){
        String positionPoint =  mPoi.getPoiName();
        ContentValues cv = new ContentValues();
        cv.put(mHelper.COL_SCORE, totalScore);
        cv.put(mHelper.COL_POSITION, positionPoint);
        if(constrainPosition(positionPoint)){ //has
            //update(String table, ContentValues values, String whereClause, String[] whereArgs)
            mDatabase.update(mHelper.TABLE_NAME,cv, mHelper.COL_POSITION +"= '"+ positionPoint +"'" ,null);
        }else{ //not has
            mDatabase.insert(mHelper.TABLE_NAME, null, cv);
        }
    }
    public void gameOver(){
        totalScore = calScore();
        saveScore();
        AlertDialog.Builder alertDialogBuilder = new AlertDialog.Builder(QuestionActivity.this);
        alertDialogBuilder
                .setTitle("สรุปผล")
                .setMessage("ตอบถูก "+countCorrect+" ข้อ จากทั้งหมด"+questionList.getSizeList()+" ข้อ\nได้คะแนน "+totalScore+" คะแนน")
                .setCancelable(false)
                .setNegativeButton("กลับหน้าหลัก", new DialogInterface.OnClickListener() {
                    @Override
                    public void onClick(DialogInterface dialogInterface, int i) {
                        finish();
                        startActivity (new Intent(getApplicationContext(),CameraViewActivity.class));
                    }
                }).show();
    }
    public boolean constrainPosition(String positionName){
        Cursor cs = mDatabase.query(MyHelper.TABLE_NAME, //ชื่อตาราง
                null,
                MyHelper.COL_POSITION+" = '"+positionName+"'",
                null,
                null,
                null,
                null,
                null);
        if(cs.getCount()>0){
            return true;
        }
        return false;
    }
}

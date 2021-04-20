package com.tourguide.example.silpakorn;

/**
 * Created by MarciaFesta Moss on 10/9/2017.
 */
public class QuestionLibrary {
    private int typeQuestion;
    private String qusetionText;
    private String choiceArr[];
    private String answerArr[];

    public QuestionLibrary(int typeQuestArr, String qustionArr,
                           String[] choiceArr, String[] answerArr) {
        this.setTypeQuestion(typeQuestArr);
        this.setQusetionArr(qustionArr);
        this.setChoiceArr(choiceArr);
        this.setAnswerArr(answerArr);
    }

    public int getTypeQuestion() {
        return typeQuestion;
    }

    public void setTypeQuestion(int typeQuestion) {
        this.typeQuestion = typeQuestion;
    }

    public String getQusetionArr() {
        return qusetionText;
    }

    public void setQusetionArr(String qusetionArr) {
        this.qusetionText = qusetionArr;
    }

    public String[] getChoiceArr() {
        return choiceArr;
    }

    public void setChoiceArr(String choiceArr[]) {
        this.choiceArr = choiceArr;
    }

    public String[] getAnswerArr() {
        return answerArr;
    }

    public void setAnswerArr(String answerArr[]) {
        this.answerArr = answerArr;
    }
}

package com.example.mariaclarasqlite.datasource;

import android.content.ContentValues;
import android.content.Context;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;
import android.util.Log;

import com.example.mariaclarasqlite.api.AppUtil;
import com.example.mariaclarasqlite.datamodel.ClienteDataModel;

public class AppDataBase extends SQLiteOpenHelper {
    public static final String NAME = "atividade_mariaClara.sqlite";
    public static int version = 1;

    SQLiteDatabase db;
    public AppDataBase(Context context) {
        super(context, NAME, null, version);
        db = getWritableDatabase();
    }

    @Override
    public void onCreate(SQLiteDatabase db) {
        Log.i(AppUtil.TAG, "Criando a tabela" + ClienteDataModel.TABELA);
        db.execSQL(ClienteDataModel.criarTabela());
    }

    @Override
    public void onUpgrade(SQLiteDatabase db, int oldVersion, int newVersion) {

    }

    /* Esse metodo insert é um método da classe SqliteOpenHelper
        Ela pega um nome de tabela e um objt ContentValues e tenta inserir
        o registro na tabela. Se conseguir, retorno maior que zero e o retorno
        fica verdadeiro.
        Esse retorno é retornado para o controller que emite uma mensagem ao usuario
        se conseguiu ou não inserir o registro */

    public boolean insert(String tabela, ContentValues dados){
        db=getWritableDatabase();
        boolean retorno = false;
        return db.insert(tabela, null, dados) > 0;
    }
}
package com.bmtadeo.AppCafeLagunArtean.controlador;

import java.sql.SQLException;

public class GestorGeneral {
	
private static GestorGeneral mGestorGeneral;
	
	private GestorGeneral() {
		//prueba
	}
	public static GestorGeneral getMGestorGeneral() {
		if(mGestorGeneral==null) {
			mGestorGeneral= new GestorGeneral();
		}
		return mGestorGeneral;
	}
	
	public boolean apuntarAlCafe(String pUsuario) throws SQLException {
	    return GestorUsuarios.getMGestorUsuarios().apuntarAlCafe(pUsuario);
	}
	
	public String nombreUsuario(String pUsuario) throws SQLException {
		return GestorUsuarios.getMGestorUsuarios().nombreUsuario(pUsuario);
	}
}

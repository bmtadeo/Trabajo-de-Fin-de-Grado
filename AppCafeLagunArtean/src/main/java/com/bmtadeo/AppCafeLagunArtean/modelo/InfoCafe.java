package com.bmtadeo.AppCafeLagunArtean.modelo;

import java.util.Date;

public class InfoCafe {
	
	public int idUsuario;
	public int turno;
	public Date fecha;
	
	public InfoCafe(int idUsuario, int turno, Date fecha) {
		this.idUsuario = idUsuario;
		this.turno = turno;
		this.fecha= fecha;
	}

}

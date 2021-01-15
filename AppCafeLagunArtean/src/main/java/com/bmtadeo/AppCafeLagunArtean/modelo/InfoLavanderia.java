package com.bmtadeo.AppCafeLagunArtean.modelo;

import java.util.Date;

public class InfoLavanderia {
	
	public Date fecha;
	public Date fechaRecogida;
	public boolean entregada;
	public boolean recogida;

	public InfoLavanderia(Date fecha, Date fechaRecogida, boolean entregada, boolean recogida) {
		this.fecha=fecha;
		this.fechaRecogida=fechaRecogida;
		this.entregada=entregada;
		this.recogida=recogida;
	}
}

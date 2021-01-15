package com.bmtadeo.AppCafeLagunArtean.controlador;

import java.awt.Graphics;
import java.awt.Graphics2D;
import java.awt.print.PageFormat;
import java.awt.print.Printable;
import java.awt.print.PrinterException;
import java.awt.print.PrinterJob;
import java.sql.SQLException;

import com.bmtadeo.AppCafeLagunArtean.modelo.Ducha;
import com.bmtadeo.AppCafeLagunArtean.modelo.InfoCafe;
import com.bmtadeo.AppCafeLagunArtean.modelo.InfoLavanderia;

public class GestorUsuarios implements Printable{
	private static GestorUsuarios mGestorUsuarios;
	private Ducha ducha;
	private InfoCafe infoCafe;
	private InfoLavanderia infoLavanderiaEntregar;
	private InfoLavanderia infoLavanderiaRecoger;
	
	
	private GestorUsuarios() {
		//prueba
	}
	
	public static GestorUsuarios getMGestorUsuarios() {
		if(mGestorUsuarios==null) {
			mGestorUsuarios= new GestorUsuarios();
		}
		return mGestorUsuarios;
		
	}
	
	public boolean apuntarAlCafe(String pUsuario) throws SQLException {
		boolean apuntado = SGBD.getMSGBD().apuntarAlCafe("INSERT INTO InfoCafe (idUsuario, fecha, turno) values (?,?,?)",pUsuario);
		if(apuntado==true) {
			ducha = SGBD.getMSGBD().obtenerTurnoDucha("SELECT Ducha.idDucha, Ducha.duchaFisica, Ducha.hora from Ducha INNER JOIN "
					+ "Duchan on Ducha.idDucha = Duchan.idDucha WHERE Duchan.idUsuario = ? and Duchan.fecha = ?", pUsuario);
			infoLavanderiaEntregar = SGBD.getMSGBD().obtenerTurnoLavanderia("SELECT InfoLavanderia.fecha from InfoLavanderia INNER JOIN"
					+ " Usuario on InfoLavanderia.idUsuario = Usuario.idUsuario WHERE InfoLavanderia.idUsuario = ? AND InfoLavanderia.fecha = ? and InfoLavanderia.entregada = ? and InfoLavanderia.recogida = ?", pUsuario);
			infoLavanderiaRecoger = SGBD.getMSGBD().obtenerRopaLavanderia("SELECT InfoLavanderia.fechaRecogida from InfoLavanderia INNER JOIN"
					+ " Usuario on InfoLavanderia.idUsuario = Usuario.idUsuario WHERE InfoLavanderia.idUsuario = ? and InfoLavanderia.entregada = ? and InfoLavanderia.recogida = ?", pUsuario);
		    infoCafe = SGBD.getMSGBD().obtenerTurnoCafe("SELECT InfoCafe.turno from InfoCafe WHERE InfoCafe.idUsuario = ? AND InfoCafe.fecha = ?", pUsuario);
		    imprimirTicket();		    
		}
		return apuntado;
	}
	public String nombreUsuario(String pUsuario) throws SQLException {
		// TODO Auto-generated method stub
		return SGBD.getMSGBD().nombreUsuario("SELECT * FROM Usuario where nick = ?",pUsuario);
		
	}
	public void imprimirTicket() {
		PrinterJob job = PrinterJob.getPrinterJob();
		job.setPrintable(this);
		try {
			job.print();
		} catch (PrinterException e1) {
			// TODO Auto-generated catch block
			e1.printStackTrace();
		}
	}
	
	public int print(Graphics g, PageFormat pf, int page) throws PrinterException {

		if (page > 0) { /* We have only one page, and 'page' is zero-based */
			return NO_SUCH_PAGE;
		}

		/*
		 * User (0,0) is typically outside the imageable area, so we must translate by
		 * the X and Y values in the PageFormat to avoid clipping
		 */
		Graphics2D g2d = (Graphics2D) g;
		g2d.translate(pf.getImageableX(), pf.getImageableY());
		/* Now we perform our rendering */
			g.drawString("Turno para el café: " + infoCafe.turno, 100, 100);	
			g.drawString("Fecha: " + infoCafe.fecha, 100, 120);	
			g.drawString("----------------", 100, 140);	
			
			if(ducha!=null) {
				g.drawString("Turno de Ducha: " + ducha.idDucha, 100, 160);	
				g.drawString("Nº de Ducha: " + ducha.duchaFisica, 100, 180);	
				g.drawString("Fecha: " + ducha.hora, 100, 200);	
				g.drawString("----------------", 100, 220);	
			}else {
				g.drawString("No tienes reservada ninguna ducha.", 100, 160);	
				g.drawString("----------------", 100, 220);	
			}
			
			if(infoLavanderiaEntregar!=null) {
				g.drawString("Entregar ropa: " + infoLavanderiaEntregar.fecha, 100, 240);	
				g.drawString("----------------", 100, 260);	
			}else {
				g.drawString("No tienes ninguna cita para entregar ropa", 100, 240);	
				g.drawString("----------------", 100, 260);	
			}
				
			if(infoLavanderiaRecoger!=null) {
				g.drawString("Recoger ropa: " + infoLavanderiaRecoger.fechaRecogida, 100, 280);	
				g.drawString("----------------", 100, 300);	
			}else {
				g.drawString("No tienes ropa para recoger", 100, 280);	
				g.drawString("----------------", 100, 230);	
			}
			
	
			
		
			 
		

		/* tell the caller that this page is part of the printed document */
		return PAGE_EXISTS;
	}

	

}

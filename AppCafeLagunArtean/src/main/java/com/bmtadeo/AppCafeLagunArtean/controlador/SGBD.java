package com.bmtadeo.AppCafeLagunArtean.controlador;

import java.sql.Connection;
import java.sql.Date;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.Statement;
import java.util.Calendar;

import com.bmtadeo.AppCafeLagunArtean.modelo.Ducha;
import com.bmtadeo.AppCafeLagunArtean.modelo.InfoCafe;
import com.bmtadeo.AppCafeLagunArtean.modelo.InfoLavanderia;

import java.sql.ResultSet;
import java.sql.SQLException;

public class SGBD {
	
	private static SGBD mSGBD;
	private Connection con;
	// Librería de MySQL
    public String driver = "com.mysql.cj.jdbc.Driver";
    // Nombre de la base de datos
    public String database = "LagunArteanV3";
    // Host
    public String hostname = "188.166.83.239";
    // Puerto
    public String port = "3306";
    // Ruta de nuestra base de datos (desactivamos el uso de SSL con "?useSSL=false")
    public String url = "jdbc:mysql://" + hostname + ":" + port + "/" + database;
    // Nombre de usuario
    public String username = "root";
    // Clave de usuario
    public String password = "lagunartean";

	
	private SGBD() {
		con= conexionBaseDeDatos();
	}
	
	public static SGBD getMSGBD() {
		if(mSGBD==null) {
			mSGBD= new SGBD();
		}
		return mSGBD;
	}
	
	/**
	 * Este metodo sirve para abrir la conexion
	 * @author Borja Martinez 
	 */
	public Connection conexionBaseDeDatos() {
		Connection conexionBD = null;
		 try {
            conexionBD = DriverManager.getConnection(url, username, password);
        } catch (SQLException e) {
            e.printStackTrace();
        }
		return conexionBD;
	}

	public String nombreUsuario(String pSQL,String pUsuario) throws SQLException {
		String nombre = null;
		ResultSet rs=null;
		PreparedStatement ps= con.prepareStatement(pSQL);
		ps.setString(1, pUsuario);
		rs= ps.executeQuery();
		while (rs.next()){
		   nombre = (String) rs.getObject("nombre");
		}
		rs.close();
		return nombre;
	}

	public boolean apuntarAlCafe(String pSQL,String pUsuario) throws SQLException {
		// TODO Auto-generated method stub
		boolean apuntado=false;
		int idUsuario = idUsuario("SELECT idUsuario from Usuario where nick = ?", pUsuario).intValue();
		System.out.println("USUARIO SCAN: "+ idUsuario);
		Calendar calendar = Calendar.getInstance();
		java.sql.Date fecha = new java.sql.Date(calendar.getTime().getTime());
		int usuarioCola = buscarUsuarioConTicket("SELECT idUsuario from InfoCafe where fecha= ? and idUsuario= ?",fecha,idUsuario).intValue();
		System.out.println("COLA: "+ usuarioCola);
		if(idUsuario==usuarioCola) {
			apuntado = false;
		}else {
			PreparedStatement preparedStmt = con.prepareStatement(pSQL);
			preparedStmt.setInt(1, idUsuario);
			preparedStmt.setDate(2, fecha);
			Integer turnoBBDD = obtenerTurnoAnterior("SELECT turno from InfoCafe where fecha = ?",fecha);
			if(turnoBBDD == null) {
				int turno = 1;
				preparedStmt.setInt(3, turno);
			}else {
				int turno = turnoBBDD.intValue()+1;
				preparedStmt.setInt(3, turno);
			}
			preparedStmt.execute();
			apuntado=true;
			ResultSet rs = null;
			PreparedStatement ps= con.prepareStatement("SELECT * from InfoCafe");
			rs= ps.executeQuery();
			while (rs.next()){
				System.out.println("COLA:");
				System.out.println( rs.getObject("idUsuario")+" "+rs.getObject("fecha")+" "+rs.getObject("turno"));
			}
			rs.close();
		}
		return apuntado;
	}
	 
	private Integer buscarUsuarioConTicket(String pSQL, Date pFecha, int pUsuario) throws SQLException {
		// TODO Auto-generated method stub
		Integer idUsuario=0;
		ResultSet rs=null;
		PreparedStatement ps= con.prepareStatement(pSQL);
		ps.setDate(1, pFecha);
		ps.setInt(2, pUsuario);
		rs= ps.executeQuery();
		while (rs.next()){
			idUsuario = (Integer) rs.getObject("idUsuario");
		}
		rs.close();
		return idUsuario;
	}

	private Integer idUsuario(String pSQL,String pUsuario) throws SQLException {
		Integer idUsuario = 0;
		ResultSet rs=null;
		PreparedStatement ps= con.prepareStatement(pSQL);
		ps.setString(1, pUsuario);
		rs= ps.executeQuery();
		while (rs.next()){
			idUsuario = (Integer) rs.getObject("idUsuario");
		}
		rs.close();
		return idUsuario;
	}
	
	private Integer obtenerTurnoAnterior(String pSQL,Date pFecha) throws SQLException {
		int turno = 0;
		ResultSet rs=null;
		PreparedStatement ps= con.prepareStatement(pSQL);
		ps.setDate(1, pFecha);
		rs= ps.executeQuery();
		while (rs.next()){
			turno = (Integer) rs.getObject("turno");
		}
		rs.close();
		return turno;
	}
	
	public InfoCafe obtenerTurnoCafe(String pSQL,String pUsuario) throws SQLException {
		int idUsuario = idUsuario("SELECT idUsuario from Usuario where nick = ?", pUsuario).intValue();
		Calendar calendar = Calendar.getInstance();
		java.sql.Date fecha = new java.sql.Date(calendar.getTime().getTime());
		InfoCafe infoCafe =null;
		ResultSet rs=null;
		PreparedStatement ps= con.prepareStatement(pSQL);
		ps.setInt(1, idUsuario);
		ps.setDate(2, fecha);
		rs= ps.executeQuery();
		while (rs.next()){
			Integer turno=(Integer)rs.getObject("turno");
			infoCafe = new InfoCafe(idUsuario,turno.intValue() ,fecha);
			System.out.println("TURNO:");
			System.out.println(rs.getObject("turno"));
		}
		rs.close();
		return infoCafe;
	}
	
	public Ducha obtenerTurnoDucha(String pSQL, String pUsuario) throws SQLException {
		int idUsuario = idUsuario("SELECT idUsuario from Usuario where nick = ?", pUsuario).intValue();
		Calendar calendar = Calendar.getInstance();
		java.sql.Date fecha = new java.sql.Date(calendar.getTime().getTime());
		Ducha ducha =null;
		ResultSet rs=null;
		PreparedStatement ps= con.prepareStatement(pSQL);
		ps.setInt(1, idUsuario);
		ps.setDate(2, fecha);
		rs= ps.executeQuery();
		while (rs.next()){
			Integer idDucha =(Integer)rs.getObject("idDucha");
			Integer duchaFisica =(Integer)rs.getObject("duchaFisica");
			String hora = (String)rs.getObject("hora");
			ducha = new Ducha(idDucha,hora ,duchaFisica);
			System.out.println("DUCHA:");
			System.out.println(rs.getObject("idDucha")+" "+rs.getObject("duchaFisica")+" "+rs.getObject("hora") );
		}
		rs.close();
		return ducha;
	}
	
	public InfoLavanderia obtenerTurnoLavanderia(String pSQL, String pUsuario) throws SQLException {
		int idUsuario = idUsuario("SELECT idUsuario from Usuario where nick = ?", pUsuario).intValue();
		Calendar calendar = Calendar.getInstance();
		java.sql.Date fecha = new java.sql.Date(calendar.getTime().getTime());
		InfoLavanderia infoLavanderia =null;
		ResultSet rs=null;
		PreparedStatement ps= con.prepareStatement(pSQL);
		ps.setInt(1, idUsuario);
		ps.setDate(2, fecha);
		ps.setBoolean(3, false);
		ps.setBoolean(4, false);
		rs= ps.executeQuery();
		while (rs.next()){
			Date fechaBBDD =(Date)rs.getObject("fecha");
			infoLavanderia = new InfoLavanderia(fechaBBDD,null ,false, false);
			System.out.println("LAVAND:");
			System.out.println(rs.getObject("fecha") );
		}
		rs.close();
		return infoLavanderia;
	}
	public InfoLavanderia obtenerRopaLavanderia(String pSQL, String pUsuario) throws SQLException {
		int idUsuario = idUsuario("SELECT idUsuario from Usuario where nick = ?", pUsuario).intValue();
		Calendar calendar = Calendar.getInstance();
		java.sql.Date fecha = new java.sql.Date(calendar.getTime().getTime());
		InfoLavanderia infoLavanderia =null;
		ResultSet rs=null;
		PreparedStatement ps= con.prepareStatement(pSQL);
		ps.setInt(1, idUsuario);
		ps.setBoolean(2, true);
		ps.setBoolean(3, false);
		rs= ps.executeQuery();
		System.out.println("ROPA:");
		while (rs.next()){
			Date fechaBBDD =(Date)rs.getObject("fechaRecogida");
			infoLavanderia = new InfoLavanderia(null,fechaBBDD ,false, false);
			System.out.println("ROPA:");
			System.out.println(rs.getObject("fechaRecogida"));
		}
		rs.close();
		return infoLavanderia;
	}
}

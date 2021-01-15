package com.bmtadeo.AppCafeLagunArtean.vista;

import java.awt.BorderLayout;
import java.awt.Dimension;
import java.awt.EventQueue;
import java.awt.Graphics;
import java.awt.Graphics2D;
import java.awt.Image;

import javax.swing.JFrame;
import javax.swing.JPanel;
import javax.swing.border.EmptyBorder;

import com.bmtadeo.AppCafeLagunArtean.controlador.GestorGeneral;
import com.bmtadeo.AppCafeLagunArtean.controlador.SGBD;
import com.github.sarxos.webcam.Webcam;
import com.google.zxing.BinaryBitmap;
import com.google.zxing.LuminanceSource;
import com.google.zxing.MultiFormatReader;
import com.google.zxing.NotFoundException;
import com.google.zxing.Result;
import com.google.zxing.client.j2se.BufferedImageLuminanceSource;
import com.google.zxing.common.HybridBinarizer;

import javax.swing.JLabel;
import javax.print.Doc;
import javax.print.DocFlavor;
import javax.print.DocPrintJob;
import javax.print.PrintException;
import javax.print.PrintService;
import javax.print.PrintServiceLookup;
import javax.print.SimpleDoc;
import javax.swing.ImageIcon;
import javax.swing.JButton;
import java.awt.event.ActionListener;
import java.awt.image.BufferedImage;
import java.awt.print.PageFormat;
import java.awt.print.Printable;
import java.awt.print.PrinterException;
import java.awt.print.PrinterJob;
import java.sql.SQLException;
import java.awt.event.ActionEvent;

public class CamaraWebUI extends JFrame {
	Result result = null;
	BufferedImage image = null;
	String usuario = null;
	/**
	 * 
	 */
	private static final long serialVersionUID = -6425320233659931540L;
	private JPanel contentPane;
	Webcam webcam;
	private JLabel label;
	private JLabel lblNewLabel;

	/**
	 * Launch the application.
	 */
	public static void main(String[] args) {
		EventQueue.invokeLater(new Runnable() {
			public void run() {
				try {
					CamaraWebUI frame = new CamaraWebUI();
					frame.setVisible(true);
				} catch (Exception e) {
					e.printStackTrace();
				}
			}
		});
	}

	/**
	 * Create the frame.
	 */
	public CamaraWebUI() {
		initialize();
	}

	private void initialize() {
		setResizable(false);
		setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		setBounds(100, 100, 600, 600);
		contentPane = new JPanel();
		contentPane.setBorder(new EmptyBorder(5, 5, 5, 5));
		contentPane.setLayout(new BorderLayout(0, 0));
		setContentPane(contentPane);
		webcam = Webcam.getDefault();
		webcam.setViewSize(new Dimension(640, 480));
		webcam.open();
		contentPane.add(getLabel(), BorderLayout.CENTER);
		new VideoFeedTaker().start();
		contentPane.add(getLblNewLabel(), BorderLayout.NORTH);
	}

	private JLabel getLabel() {
		if (label == null) {
			label = new JLabel("");
		}
		return label;
	}

	class VideoFeedTaker extends Thread {
		@Override
		public void run() {
			while (true) {
				try {
					BufferedImage image = webcam.getImage();
					label.setIcon(new ImageIcon(image));

					LuminanceSource source = new BufferedImageLuminanceSource(image);
					BinaryBitmap bitmap = new BinaryBitmap(new HybridBinarizer(source));
					try {
						result = new MultiFormatReader().decode(bitmap);
						String nombre = GestorGeneral.getMGestorGeneral().nombreUsuario(result.toString());
						if (nombre == null) {
							lblNewLabel.setText("Hola, para usar el servicio hay que registrarse.");
						} else {
							lblNewLabel.setText(
									"Hola " +nombre+ " espera a que se imprima el ticket.");
							boolean apuntado = GestorGeneral.getMGestorGeneral().apuntarAlCafe(result.toString());
							Thread.sleep(1500);
							if (apuntado) {

								lblNewLabel.setText("Recoge el ticket por favor.");
							} else {
								lblNewLabel.setText("Ya estabas apuntado a la cola.");
							}
						}

						Thread.sleep(2000);
					} catch (NotFoundException e) {
						System.err.println("Nada");
						// fall thru, it means there is no QR code in image
					} catch (SQLException e) {
						// TODO Auto-generated catch block
						e.printStackTrace();
					}
					Thread.sleep(40);
				} catch (InterruptedException e) {
					// TODO Auto-generated catch block
					e.printStackTrace();
				}
			}
		}
	}

	private JLabel getLblNewLabel() {
		if (lblNewLabel == null) {
			lblNewLabel = new JLabel("");
		}
		return lblNewLabel;
	}
}

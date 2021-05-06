
import java.sql.Statement;
import java.sql.Connection;
import java.sql.DriverManager;

import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.PreparedStatement;
import java.util.ArrayList;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 *
 * @author blazquez.asier
 */
public class Model {

    private static String url = "jdbc:sqlite:HerriakDB.db";

    /*private static Connection connect() {
        // SQLite connection string
        Connection conn = null;
        try {
            conn = DriverManager.getConnection(url);
        } catch (SQLException e) {
            System.out.println(e.getMessage());
        }
        return conn;

    }*/
    
    
        private static Connection connect() throws SQLException {
        // SQLite connection string
   
        // Connection conn = DriverManager.getConnection("jdbc:mariadb://192.168.65.1:3306/HerrienDBa", "dam1", "dam1");
          Connection conn = DriverManager.getConnection("jdbc:mariadb://localhost/herriendba", "root", "");

   
        return conn;

    }

    public void herriaGehitu(Herria h) {
        String herria = h.getHerria();
        String probintzia = h.getProbintzia();
        String oharrak = h.getOharrak();
        int hondartza;

        if (h.isHondartza()) {
            hondartza = 1;
        } else {
            hondartza = 0;
        }
        String sql = "INSERT INTO Herriak(Herria,Probintzia,Hondartza,Oharrak) VALUES(?,?,?,?)";

        try (Connection conn = connect();
                PreparedStatement pstmt = conn.prepareStatement(sql)) {
            pstmt.setString(1, herria);
            pstmt.setString(2, probintzia);
            pstmt.setInt(3, hondartza);
            pstmt.setString(4, oharrak);
            pstmt.executeUpdate();
        } catch (SQLException e) {
            System.out.println(e.getMessage());
            
        }
    }

    public String herriakInprimatu() {
        String sql = "SELECT * FROM Herriak";
        String s = "";
        try (Connection conn = connect();
                Statement stmt = conn.createStatement();
                ResultSet rs = stmt.executeQuery(sql)) {

            // loop through the result set
            while (rs.next()) {

                s = s + rs.getString("Herria") + "\t"
                        + rs.getString("Probintzia") + "\t"
                        + rs.getInt("Hondartza") + "\t"
                        + rs.getString("Oharrak") + "\n";
            }
        } catch (SQLException e) {
            System.out.println(e.getMessage());
        }

        return s;
    }

    public static ArrayList<Herria> inprimatuToArray() {
        String sql = "SELECT * FROM Herriak";
        ArrayList<Herria> herriak = new ArrayList<>();
        String s = "";
        boolean hondartza = false;
        try (Connection conn = connect();
                Statement stmt = conn.createStatement();
                ResultSet rs = stmt.executeQuery(sql)) {

            // loop through the result set
            while (rs.next()) {
                if (rs.getInt("Hondartza") == 1) {
                    hondartza = true;
                } else {
                    hondartza = false;
                }
                herriak.add(new Herria(rs.getString("Herria"), rs.getString("Probintzia"), hondartza, rs.getString("Oharrak")));

            }
        } catch (SQLException e) {
            System.out.println(e.getMessage());
        }

        return herriak;
    }

    public void herriaEzabatu(String herria) {
        String sql = "DELETE FROM Herriak WHERE Herria = ?";

        try (Connection conn = connect();
                PreparedStatement pstmt = conn.prepareStatement(sql)) {

            // set the corresponding param
            pstmt.setString(1, herria);
            // execute the delete statement
            pstmt.executeUpdate();

        } catch (SQLException e) {
            System.out.println(e.getMessage());
        }
    }

    public void herriaAldatu(Herria h) {
        System.out.println(h.getHerria());
        System.out.println(h.getOharrak());
        String sql = "UPDATE Herriak SET oharrak = ? WHERE Herria = ?";

        try (Connection conn = connect();
                PreparedStatement pstmt = conn.prepareStatement(sql)) {

            // set the corresponding param
            pstmt.setString(1, h.getOharrak());
            pstmt.setString(2, h.getHerria());
            // update 
            pstmt.executeUpdate();
        } catch (SQLException e) {
            System.out.println(e.getMessage());
        }

    }
}

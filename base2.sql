/*
Navicat MySQL Data Transfer

Source Server         : conexion
Source Server Version : 80030
Source Host           : localhost:3306
Source Database       : asis_american

Target Server Type    : MYSQL
Target Server Version : 80030
File Encoding         : 65001

Date: 2023-11-10 23:18:41
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for asistencia
-- ----------------------------
DROP TABLE IF EXISTS `asistencia`;
CREATE TABLE `asistencia` (
`id_asistencia`  int NOT NULL AUTO_INCREMENT ,
`id_empleado`  int NOT NULL ,
`entrada`  datetime NULL DEFAULT NULL ,
`salida`  datetime NULL DEFAULT NULL ,
PRIMARY KEY (`id_asistencia`),
FOREIGN KEY (`id_empleado`) REFERENCES `empleado` (`id_empleado`) ON DELETE CASCADE ON UPDATE RESTRICT,
INDEX `fk2` (`id_empleado`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8mb3 COLLATE=utf8mb3_general_ci
AUTO_INCREMENT=86

;

-- ----------------------------
-- Records of asistencia
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for cargo
-- ----------------------------
DROP TABLE IF EXISTS `cargo`;
CREATE TABLE `cargo` (
`id_cargo`  int NOT NULL AUTO_INCREMENT ,
`nom_cargo`  varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL ,
PRIMARY KEY (`id_cargo`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8mb3 COLLATE=utf8mb3_general_ci
AUTO_INCREMENT=16

;

-- ----------------------------
-- Records of cargo
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for empleado
-- ----------------------------
DROP TABLE IF EXISTS `empleado`;
CREATE TABLE `empleado` (
`id_empleado`  int NOT NULL AUTO_INCREMENT ,
`nombre`  varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL ,
`apellido`  varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL ,
`dni`  varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL ,
`cargo`  int NOT NULL ,
PRIMARY KEY (`id_empleado`),
FOREIGN KEY (`cargo`) REFERENCES `cargo` (`id_cargo`) ON DELETE CASCADE ON UPDATE RESTRICT,
INDEX `fk1` (`cargo`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8mb3 COLLATE=utf8mb3_general_ci
AUTO_INCREMENT=20

;

-- ----------------------------
-- Records of empleado
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for empresa
-- ----------------------------
DROP TABLE IF EXISTS `empresa`;
CREATE TABLE `empresa` (
`id_empresa`  int NOT NULL AUTO_INCREMENT ,
`nombre`  varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL ,
`telefono`  varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL ,
`ubicacion`  varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL ,
`ruc`  varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL ,
PRIMARY KEY (`id_empresa`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8mb3 COLLATE=utf8mb3_general_ci
AUTO_INCREMENT=1

;

-- ----------------------------
-- Records of empresa
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for usuario
-- ----------------------------
DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
`id_usuario`  int NOT NULL AUTO_INCREMENT ,
`nombre`  varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL ,
`apellido`  varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL ,
`usuario`  varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL ,
`password`  varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL ,
PRIMARY KEY (`id_usuario`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8mb3 COLLATE=utf8mb3_general_ci
AUTO_INCREMENT=11

;

-- ----------------------------
-- Records of usuario
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Auto increment value for asistencia
-- ----------------------------
ALTER TABLE `asistencia` AUTO_INCREMENT=86;

-- ----------------------------
-- Auto increment value for cargo
-- ----------------------------
ALTER TABLE `cargo` AUTO_INCREMENT=16;

-- ----------------------------
-- Auto increment value for empleado
-- ----------------------------
ALTER TABLE `empleado` AUTO_INCREMENT=20;

-- ----------------------------
-- Auto increment value for empresa
-- ----------------------------
ALTER TABLE `empresa` AUTO_INCREMENT=1;

-- ----------------------------
-- Auto increment value for usuario
-- ----------------------------
ALTER TABLE `usuario` AUTO_INCREMENT=11;
